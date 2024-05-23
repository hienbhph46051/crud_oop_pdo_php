<?php

    require_once __DIR__ . "/../models/Product.php";

    class ProductController
    {

        public $productModel;

        public function __construct()
        {
            $this->productModel = new Product();
        }

        public function listProduct()
        {
            $products = $this->productModel->getProduct();
            include __DIR__ . "/../views/list.php";
        }

        public function addProductController()
        {
            include_once __DIR__ . "/../views/Add.php";
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $price = $_POST['price'];
                var_dump($_GET['url']);
                $this->productModel->addProduct($name, $price);
                header("Location: " . "/mvc/index.php", true);
                exit();
            }
        }

        public function editProductController()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    if (!is_numeric($price)) {
                        echo "Price phai la 1 so";
                        return;
                    }
                    $this->productModel->updateProductById($name, $price, $id);
                    header("Location: /mvc/index.php");
                    exit();
                } else {
                    echo "All fields are required!";
                }
            } else {
                if (isset($_GET['url'])) {
                    $parsed_url = parse_url($_GET['url']);
                    parse_str($parsed_url['query'], $query_id);
                    $id = $query_id['id'];
                    $product = $this->productModel->getProductById($id);
                    include __DIR__ . "/../views/Edit.php";
                } else {
                    echo "Product not found";
                }
            }
        }

        public function deleteProductController()
        {
            if (isset($_GET['url'])) {
                $parsed_url = parse_url($_GET['url']);
                parse_str($parsed_url['query'], $resuult);
                $id = $resuult['id'];
                $this->productModel->deleteProductById($id);
                header("Location: " . "index.php");
                exit();
            }
        }

        public function error404()
        {
            include_once __DIR__ . "/../views/error404.php";
            exit();
        }

    }