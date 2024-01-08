<?php

namespace TaskRestApi\Infrastructure\Repository;

use TaskRestApi\Domain\Repository\TaskRepository;
use PDO;

class PdoTaskRepository implements TaskRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allTasks(): array
    {
        return array();
    }
}
