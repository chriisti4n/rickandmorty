<?php

require_once 'config/database.php';

$db = Database::getConnection();

$db->exec("

    CREATE TABLE IF NOT EXISTS users (

        id INTEGER PRIMARY KEY AUTOINCREMENT,

        name TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,

        created_at DATETIME DEFAULT CURRENT_TIMESTAMP

    )

");

$db->exec("

    CREATE TABLE IF NOT EXISTS characters (

        id INTEGER PRIMARY KEY AUTOINCREMENT,

        user_id INTEGER,

        name TEXT,
        species TEXT,
        gender TEXT,
        location TEXT,
        image TEXT,
        url TEXT,

        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP

    )

");

echo "Banco inicializado com sucesso!";