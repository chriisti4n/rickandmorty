<?php

class Database {

    private static $connection = null;

    public static function getConnection() {

        if (self::$connection === null) {

            $databasePath = __DIR__ . '/../database.sqlite';
            self::$connection = new PDO("sqlite:" . $databasePath);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }

        return self::$connection;
    }
}