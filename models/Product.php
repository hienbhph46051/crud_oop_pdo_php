<?php

    require_once "Database.php";

    class Product
    {

        public $db;

        public function __construct()
        {
            $database = new Database();
            $this->db = $database->getConnection();
        }

        public function getProduct()
        {
            $sql = "SELECT * FROM products";
            return $this->getData($sql);
        }

        public function getData($query, $getAll = true)
        {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($getAll) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function addProduct($name, $price)
        {
            $sql = "INSERT INTO products(id, name, price) VALUES(null, :name, :price)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
            $stmt->execute();
        }

        public function getProductById($id)
        {
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function updateProductById($name, $price, $id)
        {
            $sql = "UPDATE products set name = :name, price = :price WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function deleteProductById($id)
        {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

    }