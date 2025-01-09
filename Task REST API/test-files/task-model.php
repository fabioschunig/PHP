<?php

require_once 'vendor/autoload.php';

$task = new \TaskRestApi\Domain\Model\Task(1, 'Test Task 1', 'Tag 1', 0);
var_dump($task);

echo $task->description() . "\n";
echo $task->tags() . "\n";
echo $task->status() . "\n";

$pdo = \TaskRestApi\Infrastructure\Persistence\PdoConnectionCreator::createConnection();

$taskRepository = new \TaskRestApi\Infrastructure\Repository\PdoTaskRepository($pdo);
var_dump($taskRepository);

$tasks = $taskRepository->allTasks();
var_dump($tasks);
