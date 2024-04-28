<?php

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogAlunoMatriculado;
use Alura\Arquitetura\Academico\Infra\Aluno\AlunoRepositoryMemory;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;

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

$repositorio = new AlunoRepositoryMemory();

/*
$aluno = Aluno::comCPFNomeEEmail($cpf, $nome, $email)->adicionarTelefone($ddd, $numero);
$repositorio->adicionar($aluno);

print_r($aluno);
*/

// listener
$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogAlunoMatriculado());

// using DTO
$alunoDTO = new MatricularAlunoDto($cpf, $nome, $email);
$matriculaAluno = new MatricularAluno($repositorio, $publicador);
$matriculaAluno->executar($alunoDTO);
