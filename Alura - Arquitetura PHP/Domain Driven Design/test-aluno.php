<?php

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\CPF;
use Alura\Arquitetura\Academico\Dominio\Email;
use Alura\Arquitetura\Academico\Infra\Aluno\AlunoRepositoryPdo;

require __DIR__ . '/vendor/autoload.php';

$databasePath = __DIR__ . '/database/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$alunoRepository = new AlunoRepositoryPdo($pdo);

$cpf = new CPF('490.621.190-93');
$email = new Email('teste@email.com');
$aluno = new Aluno($cpf, 'Test Aluno', $email);
$aluno->adicionarTelefone('47', '999315708');
$aluno->adicionarTelefone('48', '979686701');
$aluno->adicionarTelefone('49', '984768320');
$alunoRepository->adicionar($aluno);

$result = $alunoRepository->buscarPorCpf($cpf);
print_r($result);

$cpf = new CPF('732.093.500-78');
$email = new Email('teste2@email.com');
$aluno = new Aluno($cpf, 'Test Aluno 2', $email);
$aluno->adicionarTelefone('49', '981782406');
$aluno->adicionarTelefone('48', '972903429');
$alunoRepository->adicionar($aluno);

$cpf = new CPF('633.032.010-13');
$email = new Email('teste3@email.com');
$aluno = new Aluno($cpf, 'Test Aluno 3', $email);
// no phones
$alunoRepository->adicionar($aluno);

$result = $alunoRepository->buscarTodos();
print_r($result);
