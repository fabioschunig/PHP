<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET['id'];
$sqlDelete = "DELETE FROM videos WHERE id = ?";
$statement = $pdo->prepare($sqlDelete);
$statement->bindValue(1, $id);

if ($statement->execute() === false) {
    header("location: /index.php?sucesso=0");
} else {
    header("location: /index.php?sucesso=1");
}
