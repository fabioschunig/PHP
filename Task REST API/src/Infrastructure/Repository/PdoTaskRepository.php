<?php

namespace TaskRestApi\Infrastructure\Repository;

use PDO;
use TaskRestApi\Domain\Repository\TaskRepository;
use TaskRestApi\Domain\Model\Task;

class PdoTaskRepository implements TaskRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allTasks(): array
    {
        $sqlQuery = 'SELECT * FROM task;';
        $stmt = $this->connection->query($sqlQuery);

        $taskDataList = $stmt->fetchAll();
        $taskList = [];

        foreach ($taskDataList as $taskData) {
            $task = new Task(
                $taskData['id'],
                $taskData['description'],
                $taskData['tags'],
                $taskData['id'],
            );

            $taskList[] = $task;
        }

        return $taskList;
    }
}
