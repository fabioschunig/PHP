<?php

use Alura\DesignPattern\PDOConnection;

require 'vendor/autoload.php';

// $pdo = new \PDO('sqlite::memory:');
$pdo = new PDOConnection('sqlite::memory:');
echo "PDO:" . PHP_EOL;
var_dump($pdo);

// $pdo2 = new \PDO('sqlite::memory:');
$pdo2 = new PDOConnection('sqlite::memory:');
echo "PDO2:" . PHP_EOL;
var_dump($pdo2);
