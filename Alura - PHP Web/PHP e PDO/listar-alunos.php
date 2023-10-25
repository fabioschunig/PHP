<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$sqlSelect = "SELECT * FROM students;";

echo $sqlSelect . PHP_EOL;

$statement = $pdo->query($sqlSelect);
var_dump($statement);

$studentList = $statement->fetchAll();
var_dump($studentList);

echo $studentList[0][1] . PHP_EOL;
echo $studentList[0]['name'] . PHP_EOL;
