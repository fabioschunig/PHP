<?php

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$birthDate = new \DateTimeImmutable('1992-04-13');

$repo = new PdoStudentRepository($pdo);
$studentList = $repo->studentsBirthAt($birthDate);
var_dump($studentList);

if (count($studentList) > 0) {
    $student = $studentList[0];
    var_dump($repo->remove($student));
}

exit;


$statement = $pdo->prepare("DELETE FROM students WHERE id = :id");

$statement->bindValue(':id', 2, PDO::PARAM_INT);
var_dump($statement->execute());
