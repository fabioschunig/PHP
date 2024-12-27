<?php

require_once 'vendor/autoload.php';

$task = new \TaskRestApi\Domain\Model\Task(1, 'Test Task 1', 'Tag 1', 0);
var_dump($task);

echo $task->description() . "\n";
echo $task->tags() . "\n";
echo $task->status() . "\n";

$taskRepository = new \TaskRestApi\Infrastructure\Repository\PdoTaskRepository;
var_dump($taskRepository);

$tasks = $taskRepository->allTasks();
var_dump($tasks);
