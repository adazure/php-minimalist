<?php

if (!empty($ROUTES)) {

    // Request üzerinden gelen bir takım değerler alınıyor
    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
    $REQUEST_URI = $_SERVER['REQUEST_URI'];

    // Gelen istek tipine göre varsa URL bilgileri eşleştiriliyor
    foreach ($ROUTES[$REQUEST_METHOD] as $ROUTE) {

        // Gerekli değerler
        $method = $ROUTE['method'];
        $url = $ROUTE['url'];
        $regex = $ROUTE['regex'];

        // Regex ile karşılaştırma yapılıyor
        preg_match_all($regex, $REQUEST_URI, $result);
        if ($result) {
            print_r($result);
        }
    }
}
