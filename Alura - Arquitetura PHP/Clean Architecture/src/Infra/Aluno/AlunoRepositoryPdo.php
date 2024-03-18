<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoRepository;
use Alura\Arquitetura\Dominio\Aluno\Telefone;
use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Email;

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

        /** @var Telefone $telefone */
        foreach ($aluno->telefones() as $telefone) {
            $sql = "INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue('ddd', $telefone->ddd());
            $stmt->bindValue('numero', $telefone->numero());
            $stmt->bindValue('cpf_aluno', $aluno->cpf());
            $stmt->execute();
        }
    }

    public function buscarPorCpf(CPF $cpf): Aluno
    {
        $sql = "SELECT * FROM alunos WHERE cpf = :cpf";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf', $cpf, \PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        $aluno = new Aluno(
            new CPF($result['cpf']),
            $result['nome'],
            new Email($result['email']),
        );

        return $aluno;
    }

    public function buscarTodos(): array
    {
        //
    }
}
