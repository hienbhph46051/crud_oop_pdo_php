<?php

    class Database
    {

        public $conn;

        private string $dbHost = '127.0.0.1';

        private string $dbName = 'buoi2_php2';

        private string $dbUser = 'root';

        private string $dbPassword = '';

        public function getConnection()
        {
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName,
                  $this->dbUser, $this->dbPassword);
                //                echo "Connect successfully";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->conn;
        }

    }

    //    $db = new Database();
    //    $db->getConnection();