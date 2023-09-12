<?php

require_once 'Config.php';

class Database {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(Config::getDSN(), Config::getDbUser(), Config::getDbPassword(), Config::getOptions());
            echo "Connexion réussie à la base de données!";
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}

?>
