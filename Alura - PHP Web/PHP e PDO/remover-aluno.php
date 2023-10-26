<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$statement = $pdo->prepare("DELETE FROM students WHERE id = :id");

$statement->bindValue(':id', 2, PDO::PARAM_INT);
var_dump($statement->execute());
