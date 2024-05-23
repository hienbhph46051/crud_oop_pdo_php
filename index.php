<?php

    //    ini_set('display_errors', 1);
    //    ini_set('display_startup_errors', 1);
    //    error_reporting(E_ALL);

    require_once __DIR__ . "/controllers/ProductController.php";
    $controller = new ProductController();
    $url = isset($_GET['url']) ? $_GET['url'] : "/";
    switch (true) {
        case $url === '/':
            $controller->listProduct();
            break;
        case $url === 'views/Add.php':
            $controller->addProductController();
            break;
        case preg_match('/views\/Edit\.php/', $url):
            $controller->editProductController();
            break;
        case preg_match('/views\/delete/', $url):
            var_dump($url);
            $controller->deleteProductController();
            break;
        default:
            $controller->error404();
            break;
    }