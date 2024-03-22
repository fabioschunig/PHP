<?php

use Alura\Arquitetura\Infra\Aluno\CifradorDeSenhaMd5;

require __DIR__ . '/vendor/autoload.php';

$senha = '12345';

$cifradorMd5 = new CifradorDeSenhaMd5();
$senhaCifrada = $cifradorMd5->cifrar($senha);
echo $senhaCifrada . PHP_EOL;
