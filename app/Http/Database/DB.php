<?php
namespace Titan\Sistema\Database;

use PDO;
use PDOException;

class DB {
    private $host       = '127.0.0.1';

    private $dbname     = 'titan_software';

    private $username   = 'root';

    private $password   = '';

    private $charset    = 'UTF8';

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        }
    }

    public function conn() {
        return $this->pdo;
    }

    public function disconnect() {
        $this->pdo = null;
    }

    public function getPDO() {
        return $this->pdo;
    }

    public function isConnected() {
        return $this->pdo !== null;
    }
}