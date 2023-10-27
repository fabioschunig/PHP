<?php

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$statement = $pdo->prepare("DELETE FROM students WHERE id = :id");

$statement->bindValue(':id', 2, PDO::PARAM_INT);
var_dump($statement->execute());
