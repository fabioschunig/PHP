<?php

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

echo "Conectado ao SQLite" . PHP_EOL;

$sqlCreateDatabase = '
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY,
        name TEXT,
        birth_date TEXT
    );

    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY (student_id) REFERENCES students (ID)
    );
';

$pdo->exec($sqlCreateDatabase);

// testando inclusão de telefones
$pdo->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('48', '123456789', 1), ('49', '22222222', 1);");
