<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sqlInsert = "INSERT INTO videos (url, title) VALUES (?, ?)";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $_POST['url']);
$statement->bindValue(2, $_POST['title']);

var_dump($statement->execute());
