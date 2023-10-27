<?php

namespace Alura\Pdo\Infrastructure\Repository;

use PDO;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionCreator::createConnection();
    }

    public function allStudents(): array
    {
        $sqlSelect = "SELECT * FROM students;";
        $statement = $this->connection->query($sqlSelect);
        $studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);

        $studentList = [];
        foreach ($studentDataList as $studentData) {
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birth_date']),
            );
        }

        return $studentList;
    }

    public function studentsBirthAt(\DateTimeInterface $birthDate): array
    {
        return array();
    }

    public function save(Student $student): bool
    {
        return false;
    }

    public function remove(Student $student): bool
    {
        return false;
    }
}
