<?php

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$birthDate = new \DateTimeImmutable('1992-04-13');

$repo = new PdoStudentRepository();
$studentList = $repo->studentsBirthAt($birthDate);
var_dump($studentList);

if (count($studentList) > 0) {
    $student = $studentList[0];
    var_dump($repo->remove($student));
}

exit;


$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$statement = $pdo->prepare("DELETE FROM students WHERE id = :id");

$statement->bindValue(':id', 2, PDO::PARAM_INT);
var_dump($statement->execute());
