<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Email;
use Alura\Arquitetura\Infra\Aluno\AlunoRepositoryPdo;

require __DIR__ . '/vendor/autoload.php';

$databasePath = __DIR__ . '/database/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$cpf = new CPF('490.621.190-93');
$email = new Email('teste@email.com');
$aluno = new Aluno($cpf, 'Test Aluno', $email);

$aluno->adicionarTelefone('47', '999315708');
$aluno->adicionarTelefone('48', '979686701');
$aluno->adicionarTelefone('49', '984768320');

$alunoRepository = new AlunoRepositoryPdo($pdo);
$alunoRepository->adicionar($aluno);

$result = $alunoRepository->buscarPorCpf($cpf);
print_r($result);
