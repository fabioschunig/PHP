<?php

$arquivoBancoDados = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $arquivoBancoDados);

echo "Conectado ao SQLite: " . $arquivoBancoDados . PHP_EOL;

$sqlCreate = 'CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);';

$pdo->exec($sqlCreate);