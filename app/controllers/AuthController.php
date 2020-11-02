<?php

namespace app\controllers;

use app\core\HttpException;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\models\User;

class AuthController extends Controller
{
  public function login(Request $request, Response $response)
  {
    self::validateBody('user')->isNotNull()->isLength(['min' => 2, 'max' => 25])->trimBody();
    self::validateBody('password')->isNotNull()->isLength(['min' => 6, 'max' => 30])->trimBody();

    if (!empty(self::validateResults())) {
      $response->setStatusCode($response::HTTP_BAD_REQUEST)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      $user = User::findOne(['email' => $request->getBody('user')]);
      if (!$user) {
        $response->setStatusCode($response::HTTP_NOT_FOUND)->setContent(json_encode(['errors' => [[
          "msg" => "User Not Found",
          "param" => "user"
        ]]]))->send();
      }
      if (!password_verify($request->getBody('password'), $user->password)) {
        $response->setStatusCode($response::HTTP_NOT_FOUND)->setContent(json_encode(['errors' => [[
          "msg" => "Inncorrect Password",
          "param" => "password"
        ]]]))->send();
      }
      $request->login($user);
      $response->redirect('/');
    }
  }

  public function goauth(Request $request, Response $response)
  {
    $response->setStatusCode($response::HTTP_TOO_EARLY)->setContent($response->render('error', [
      'error' => [
        'status' => $response::HTTP_TOO_EARLY,
        'message' => 'Coming Soon',
        'stack' => ''
      ]
    ]))->send();
  }

  public function register(Request $request, Response $response)
  {
    self::validateBody('fullname')->isNotNull()->isLength(['min' => 2, 'max' => 30])->isAlphaSpace()->trimBody();
    self::validateBody('username')->isNotNull()->isLength(['min' => 6, 'max' => 30])->isAlphaNumeric()->custom(function ($username) {
      return User::findOne(['username' => $username], function ($user) {
        if ($user) {
          return new \Error('Username Has Already Been Used by Other User');
        }
      });
    })->trimBody();
    self::validateBody('email')->isNotNull()->isEmail()->custom(function ($email) {
      return User::findOne(['email' => $email], function ($user) {
        if ($user) {
          return new \Error('Email Has Already Been Used by Other User');
        }
      });
    })->trimBody();
    self::validateBody('getpassword')->isNotNull()->isLength(['min' => 6, 'max' => 250])->isNotIn(['account'])->trimBody();
    self::validateBody('repassword')->isNotNull()->equals($request->getBody('getpassword'), 'Confirm Password Does Not Match')->trimBody();

    if (!empty(self::validateResults())) {
      $response->setStatusCode($response::HTTP_BAD_REQUEST)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      // $randomKey = strtoupper(bin2hex(openssl_random_pseudo_bytes(4, $cstrong)));
      $randomKey = strtoupper(bin2hex(random_bytes(4)));
      $token = openssl_encrypt([$request->getBody(), time() + 60 * 60 * 60], CIPHER_METHOD, $randomKey);
      $verify = $response->render('index', ['token' => $token, 'randomKey' => $randomKey, 'member' => $request->getBody()]);
      User::create([
        'name' => $request->getBody('fullname'),
        'username' => $request->getBody('username'),
        'email' => $request->getBody('email'),
        'image' => base64_encode(file_get_contents(ROOT_DIR . '/assets/member/default.jpg')),
        'role' => 'unverified',
        'password' => password_hash($request->getBody('getpassword'), PASSWORD_DEFAULT),
        'token' => $token,
        'other' => json_encode(['googleId' => ''])
      ], function ($results, $error) {
        global $verify;
        global $request;
        global $response;
        global $randomKey;
        if ($error) {
          throw new HttpException(500);
        }
        if ($results) {
          try {
            // To send HTML mail, the Content-type header must be set
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';

            // Additional headers
            $headers[] = "To: $request->getBody(fullname) <$request->getBody(email)>";
            $headers[] = "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM_NAME . ">";

            mail($request->getBody('email'), 'Account Activation', $verify, implode("\r\n", $headers));
            $response->setStatusCode($response::HTTP_OK)->setContent(json_encode([
              'results' => openssl_encrypt([$request->getBody('email'), time() + 60 * 60 * 60], CIPHER_METHOD, $randomKey)
            ]))->send();
          } catch (\Throwable $th) {
            throw new HttpException(500);
          }
        }
      });
    }
  }

  public function verifyPostMethod(Request $request, Response $response)
  {
    // $token = openssl_decrypt($crypted_token, CIPHER_METHOD, 'nkf254ol35');
  }

  public function logout(Request $request, Response $response)
  {
    $request->logout();
    $response->redirect('/');
  }
}
