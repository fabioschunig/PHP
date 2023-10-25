<?php

$arquivoBancoDados = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $arquivoBancoDados);

echo "Conectado ao SQLite: " . $arquivoBancoDados . PHP_EOL;
