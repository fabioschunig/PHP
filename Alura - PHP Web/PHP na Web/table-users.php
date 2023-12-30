<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sqlTableUsers = "CREATE TABLE users (id INTEGER PRIMARY KEY, email TEXT, password TEXT);";

$pdo->exec($sqlTableUsers);
