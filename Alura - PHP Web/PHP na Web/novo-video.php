<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if ($url === false) {
    header("location: /index.php?sucesso=0");
}

$sqlInsert = "INSERT INTO videos (url, title) VALUES (?, ?)";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $_POST['url']);
$statement->bindValue(2, $_POST['titulo']);

if ($statement->execute() === TRUE) {
    header("location: /index.php");
}
