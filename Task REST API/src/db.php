<?php

$host = 'localhost';     // Endereço do banco de dados
$dbname = 'task_rest_api';   // Nome do banco de dados
$username = 'root';      // Usuário do banco de dados
$password = '';          // Senha do banco de dados

// database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}
