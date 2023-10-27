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

    private function selectStudents(string $sqlSelect): array
    {
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

    public function allStudents(): array
    {
        return $this->selectStudents("SELECT * FROM students;");
    }

    public function studentsBirthAt(\DateTimeInterface $birthDate): array
    {
        $dateFormated = $birthDate->format('Y-m-d');
        $sqlSelect = "SELECT * FROM students WHERE birth_date = '$dateFormated';";

        return $this->selectStudents($sqlSelect);
    }

    public function save(Student $student): bool
    {
        $studentId = $student->id();

        if ($studentId === null) {
            $sqlSave = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
        } else {
            $sqlSave = "UPDATE students SET name = :name, birth_date = :birth_date WHERE id = $studentId;";
        }

        $statement = $this->connection->prepare($sqlSave);
        $statement->bindValue(':name', $student->name());
        $statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

        return $statement->execute();
    }

    public function remove(Student $student): bool
    {
        return false;
    }
}
