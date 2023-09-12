<?php

class Config {
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'moduleconnexionb2';
    private const DB_USER = 'root';
    private const DB_PASSWORD = 'Romain-1964';
    private const CHARSET = 'utf8mb4';

    public static function getDSN() {
        return "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=" . self::CHARSET;
    }

    public static function getOptions() {
        return [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    }

    public static function getDbUser() {
        return self::DB_USER;
    }

    public static function getDbPassword() {
        return self::DB_PASSWORD;
    }
}

?>
