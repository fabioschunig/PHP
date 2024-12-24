<?php

namespace TaskRestApi\Domain\Repository;

interface TaskRepository
{
    public function allTasks(): array;
}
