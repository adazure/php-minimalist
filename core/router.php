<?php
if (!empty($ROUTES)) {

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
            echo $twig->render($view . '.html', []);
            exit;
        }
    }
}
