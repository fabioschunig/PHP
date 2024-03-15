<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoRepository;
use Alura\Arquitetura\Dominio\CPF;

class AlunoRepositoryPdo implements AlunoRepository
{
    public function __construct(private \PDO $connection)
    {
    }

    public function adicionar(Aluno $aluno): void
    {
        $sql = "INSERT INTO alunos VALUES (:cpf, :nome, :email);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf', $aluno->cpf());
        $stmt->bindValue('nome', $aluno->nome());
        $stmt->bindValue('email', $aluno->email());
        $stmt->execute();
    }

    public function buscarPorCpf(CPF $cpf): Aluno
    {
        //
    }

    public function buscarTodos(): array
    {
        //
    }
}
