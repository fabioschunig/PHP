<?php

use Alura\Arquitetura\Academico\Infra\Aluno\CifradorDeSenhaMd5;
use Alura\Arquitetura\Academico\Infra\Aluno\CifradorDeSenhaPhp;

require __DIR__ . '/vendor/autoload.php';

$senha = '12345';

$cifradorMd5 = new CifradorDeSenhaMd5();
$senhaCifrada = $cifradorMd5->cifrar($senha);
echo $senhaCifrada . PHP_EOL;

$cifradorPhp = new CifradorDeSenhaPhp();
$senhaCifrada = $cifradorPhp->cifrar($senha);
echo $senhaCifrada . PHP_EOL;
