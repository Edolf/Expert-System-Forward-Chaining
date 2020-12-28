<?php

namespace app\controllers;

use app\core\HttpException;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
// use app\core\Cookie;

use app\models\User;

class AuthController extends Controller
{
  public function login(Request $request, Response $response)
  {
    // echo '<pre>';
    // var_dump($request->getBody());
    // echo '</pre>';
    self::validateBody('password')->isNotNull()->isLength(['min' => 6, 'max' => 30])->trim();
    self::validateBody('user')->isNotNull()->isLength(['min' => 2, 'max' => 25])->custom(function ($user, $request) {
      $user = User::findOne([User::OR(['username' => $user, 'email' => $user])]);
      if (!$user || !password_verify($request->getBody('password'), $user->password)) {
        return new \Error('User Not Found');
      }
    })->trim();

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      $user = User::findOne([User::OR([
        'username' => $request->getBody('user'), 'email' => $request->getBody('user')
      ])]);
      if ($request->login($user)) {
        // if ($request->getBody('rememberme') == 'on') {
        //   $randomKey = bin2hex(random_bytes(4));
        //   if (User::update(['rememberme' => $randomKey], ['id' => $user->{array_keys($user::primaryKey())[0]}])) {
        //     Cookie::set(REMEMBER_ME_COOKIE_NAME, $randomKey, REMEMBER_ME_COOKIE_EXPIRY);
        //   } else {
        //     self::validateBody('user')->custom(function () {
        //       return new \Error('Something Wrong');
        //     });
        //     $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
        //   }
        // }
        $response->redirect('/');
      } else {
        self::validateBody('user')->custom(function () {
          return new \Error('Something Wrong');
        });
        $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
      }
    }
  }

  public function goauth(Request $request, Response $response)
  {
    $response->setStatusCode(503)->setContent($response->render('error', [
      'error' => [
        'status' => 503,
        'message' => 'Coming Soon',
        'stack' => ''
      ]
    ]))->send();
  }

  public function register(Request $request, Response $response)
  {
    self::validateBody('fullname')->isNotNull()->isLength(['min' => 2, 'max' => 30])->isAlphaSpace()->trim();
    self::validateBody('username')->isNotNull()->isLength(['min' => 6, 'max' => 30])->isAlphaNumeric()->custom(function ($username) {
      return User::findOne(['username' => $username], function ($user) {
        if ($user) {
          return new \Error('Username Has Already Been Used by Other User');
        }
      });
    })->trim();
    self::validateBody('email')->isNotNull()->isEmail()->custom(function ($email) {
      return User::findOne(['email' => $email], function ($user) {
        if ($user) {
          return new \Error('Email Has Already Been Used by Other User');
        }
      });
    })->trim();
    self::validateBody('getpassword')->isNotNull()->isLength(['min' => 6, 'max' => 250])->isNotIn(['account'])->trim();
    self::validateBody('repassword')->isNotNull()->equals($request->getBody('getpassword'), 'Confirm Password Does Not Match')->trim();

    if (!empty(self::validateResults())) {
      return $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      $randomKey = strtoupper(bin2hex(random_bytes(4)));
      $encIV = openssl_random_pseudo_bytes(openssl_cipher_iv_length(CIPHER_METHOD));
      $token = openssl_encrypt(implode(',', [implode(',', $request->getBody()), time() + 60 * 60 * 60]), CIPHER_METHOD, $randomKey, 0, $encIV) . '::' . bin2hex($encIV);
      $verify = $response->render('auths/verify/verifyhtml', ['token' => $token, 'randomKey' => $randomKey, 'memberName' => $request->getBody('fullname')]);

      if (User::create([
        'name' => $request->getBody('fullname'),
        'username' => $request->getBody('username'),
        'email' => $request->getBody('email'),
        'image' => base64_encode(file_get_contents(ROOT_DIR . '/assets/member/default.jpg')),
        'role' => 'unverified',
        'verifiedAt' => null,
        'password' => password_hash($request->getBody('getpassword'), PASSWORD_DEFAULT),
        'rememberme' => null,
        'token' => $token,
        'other' => json_encode(['googleId' => ''])
      ])) {
        // $headers[] = 'MIME-Version: 1.0';
        // $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        // $headers[] = "To: " . $request->getBody('fullname') . " <" . $request->getBody('email') . ">";
        // $headers[] = "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM_ADDRESS . ">";
        // mail($request->getBody('email'), 'Account Activation', $verify, implode("\r\n", $headers));

        // $encIV = openssl_random_pseudo_bytes(openssl_cipher_iv_length(CIPHER_METHOD));
        // $email = openssl_encrypt(implode(',', [$request->getBody('email'), time() + 60 * 60 * 60]), CIPHER_METHOD, $randomKey, 0, $encIV) . '::' . bin2hex($encIV);
        // return $response->setStatusCode(200)->setContent(json_encode(['results' => $email]))->send();

        if ($request->login(User::findOne(['email' => $request->getBody('email')]))) {
          $response->redirect('/');
        }
      } else {
        self::validateBody('fullname')->custom(function () {
          return new \Error('Something Wrong');
        });
        $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
      }
    }
  }

  public function verifyPostMethod(Request $request, Response $response)
  {
    // list($token, $encIV) = explode("::", $token);
    // $token = openssl_decrypt($token, CIPHER_METHOD, $randomKey, 0, hex2bin($encIV));
  }

  public function logout(Request $request, Response $response)
  {
    $request->logout();
    $response->redirect('/');
  }
}
