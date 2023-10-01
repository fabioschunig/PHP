<?php

use Alura\DesignPattern\Log\StdoutLogManager;

require 'vendor/autoload.php';

$logManager = new StdoutLogManager();
$logManager->log('info', 'Teste de log - Stdout');
