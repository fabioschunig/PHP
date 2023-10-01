<?php

use Alura\DesignPattern\Log\FileLogManager;
use Alura\DesignPattern\Log\StdoutLogManager;

require 'vendor/autoload.php';

$message = 'Teste de log';
$severidade = 'info';

$logManager = new StdoutLogManager();
$logManager->log($severidade, $message . ' - StdOut');

$logManager = new FileLogManager(__DIR__ . '/log.txt');
$logManager->log($severidade, $message . ' - File');
