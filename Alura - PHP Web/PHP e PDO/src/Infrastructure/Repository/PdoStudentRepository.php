<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use DateTimeInterface;

class PdoStudentRepository implements StudentRepository
{
    public function allStudents(): array
    {
        return array();
    }

    public function studentsBirthAt(DateTimeInterface $birthDate): array
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
