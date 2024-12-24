<?php

namespace TaskRestApi\Infrastructure\Repository;

use TaskRestApi\Domain\Repository\TaskRepository;

class PdoTaskRepository implements TaskRepository
{
    public function allTasks(): array
    {
        return array();
    }
}
