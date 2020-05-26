<?php
if (!empty($ROUTES)) {

    $twig;
    $loader = new Twig_Loader_Filesystem('views');
    $this->twig = new Twig_Environment($loader);
    $filter = new Twig_Filter('lang', 'Lang::get');
    $this->twig->addFilter($filter);
    $this->twig->addFunction(new Twig_Function('query', 'Router::getQuery'));
    $this->twig->addFilter(new Twig_Filter('html', 'htmlspecialchars_decode'));

    // Request üzerinden gelen bir takım değerler alınıyor
    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
    $REQUEST_URI = $_SERVER['REQUEST_URI'];

    // Gelen istek tipine göre varsa URL bilgileri eşleştiriliyor
    foreach ($ROUTES[$REQUEST_METHOD] as $ROUTE) {

        // Gerekli değerler
        $view = $ROUTE['view'];
        $url = $ROUTE['url'];
        $regex = $ROUTE['regex'];


        // Regex ile karşılaştırma yapılıyor
        preg_match_all('/^' . $regex . '[\/]*$/', $REQUEST_URI, $result);
        if (count($result[0]) > 0) {
            echo file_get_contents('views/' . $view);
            exit;
        }
    }
}
