<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$repo = new PdoStudentRepository();
$students = $repo->allStudents();
var_dump($students);

$birthDate = new DateTimeImmutable('1984-09-15');
$students = $repo->studentsBirthAt($birthDate);
var_dump($students);

exit;


$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

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
