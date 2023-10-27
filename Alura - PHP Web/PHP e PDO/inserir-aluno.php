<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$birthDate = new \DateTimeImmutable('1992-04-13');

$student = new Student(
    null,
    "Novo estudante",
    $birthDate
);

$repo = new PdoStudentRepository();
$repo->save($student);

$studentList = $repo->studentsBirthAt($birthDate);
var_dump($studentList);

$student = $studentList[0];
$student->changeName("Nome do estudante mudado");
$repo->save($student);

$studentList = $repo->studentsBirthAt($birthDate);
var_dump($studentList);

exit;

$pdo = \Alura\Pdo\Infrastructure\Persistence\ConnectionCreator::createConnection();

$student = new Student(
    null,
    "Teste nome estudante",
    new \DateTimeImmutable('1998-03-07')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo "Aluno incluído" . PHP_EOL;
}
