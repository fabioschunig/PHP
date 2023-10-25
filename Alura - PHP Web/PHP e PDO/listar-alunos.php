<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$sqlSelect = "SELECT * FROM students;";

echo $sqlSelect . PHP_EOL;

$statement = $pdo->query($sqlSelect);
var_dump($statement);

$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($studentDataList);

// echo $studentDataList[0][1] . PHP_EOL;
echo $studentDataList[0]['name'] . PHP_EOL;

$studentList = [];
foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date']),
    );
}

var_dump($studentList);
