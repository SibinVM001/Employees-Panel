<?php

class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;

    public function __construct() {
        $this->host = Config::get('mysql.host');
        $this->username = Config::get('mysql.username');
        $this->password = Config::get('mysql.password');
        $this->dbname = Config::get('mysql.dbname');
    }

    public function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();

            exit;
        }
    }
}