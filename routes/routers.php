<!-- Router::get('/', function (Request $request, Response $response) {
  $navbars = Navbar::query()->select('*')->from('Navbars', 'n')->where('n.categoryId = 4');
  $request->render('index', [
    'navbars' => $navbars->getQueryResult(),
    'categories' => Category::all()
  ]);
}); -->