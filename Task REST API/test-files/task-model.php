<?php

require_once 'vendor/autoload.php';

$task = new \TaskRestApi\Domain\Model\Task;
var_dump($task);

$taskRepository = new \TaskRestApi\Infrastructure\Repository\PdoTaskRepository;
var_dump($taskRepository);

$tasks = $taskRepository->allTasks();
var_dump($tasks);
