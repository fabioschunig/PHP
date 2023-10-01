<?php

use Alura\DesignPattern\Log\FileLogManager;
use Alura\DesignPattern\Log\StdoutLogManager;

require 'vendor/autoload.php';

//$logManager = new StdoutLogManager();
$logManager = new FileLogManager(__DIR__ . '/log.txt');
$logManager->log('info', 'Teste de log - Stdout');
