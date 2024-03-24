<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Infra\Aluno\AlunoRepositoryMemory;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

echo "CPF: " . $cpf . PHP_EOL;
echo "Nome: " . $nome . PHP_EOL;
echo "E-mail: " . $email . PHP_EOL;
echo "DDD: " . $ddd . PHP_EOL;
echo "Número: " . $numero . PHP_EOL;

$aluno = Aluno::comCPFNomeEEmail($cpf, $nome, $email)->adicionarTelefone($ddd, $numero);
$repositorio = new AlunoRepositoryMemory();
$repositorio->adicionar($aluno);

print_r($aluno);
