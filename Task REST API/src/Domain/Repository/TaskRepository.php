<?php

namespace TaskRestApi\Repository;

interface TaskRepository
{
    public function allTasks(): array;
}
