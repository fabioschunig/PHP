<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoNaoEncontrado;
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

        $sql = "INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf_aluno', $aluno->cpf());

        /** @var Telefone $telefone */
        foreach ($aluno->telefones() as $telefone) {
            $stmt->bindValue('ddd', $telefone->ddd());
            $stmt->bindValue('numero', $telefone->numero());
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

        $aluno = $this->alunoHydrate($result['cpf'], $result['nome'], $result['email']);

        $sql = "SELECT * FROM telefones WHERE cpf_aluno = :cpf";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf', $cpf, \PDO::PARAM_STR);
        $stmt->execute();

        while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $aluno->adicionarTelefone($result['ddd'], $result['numero']);
        }

        return $aluno;
    }

    public function buscarTodos(): array
    {
        $alunos = array();

        $sql = "SELECT * FROM alunos ORDER BY nome, cpf";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $aluno = $this->alunoHydrate($result['cpf'], $result['nome'], $result['email']);

            $sql = "SELECT * FROM telefones WHERE cpf_aluno = :cpf";
            $stmtTelefones = $this->connection->prepare($sql);
            $stmtTelefones->bindValue('cpf', $aluno->cpf(), \PDO::PARAM_STR);
            $stmtTelefones->execute();

            while ($resultTelefones = $stmtTelefones->fetch(\PDO::FETCH_ASSOC)) {
                $aluno->adicionarTelefone($resultTelefones['ddd'], $resultTelefones['numero']);
            }

            $alunos[] = $aluno;
        }

        return $alunos;
    }

    private function alunoHydrate(string $cpf, string $nome, string $email): Aluno
    {
        return new Aluno(
            new CPF($cpf),
            $nome,
            new Email($email),
        );
    }

    private function buscarAlunos(CPF|null $cpf): array
    {
        $sql =
            "SELECT cpf, nome, email, ddd, numero as numero_telefone " .
            "FROM alunos " .
            "LEFT JOIN telefones ON (telefones.cpf_aluno = alunos.cpf) ";

        if ($cpf) {
            $sql .= "WHERE alunos.cpf = :cpf;";
        }

        $stmt = $this->connection->prepare($sql);

        if ($cpf) {
            $stmt->bindValue("cpf", (string) $cpf);
        }

        $stmt->execute();

        $dadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($dadosAlunos) === 0) {
            throw new AlunoNaoEncontrado($cpf);
        }

        return $this->mapearAlunos($dadosAlunos);
    }

    private function mapearAlunos(array $dadosAlunos): array
    {
        $alunos = array();

        return $alunos;
    }

    private function mapearAluno(array $dadosAluno): Aluno
    {
        $primeiraLinha = $dadosAluno[0];
        $aluno = Aluno::comCPFNomeEEmail(
            $primeiraLinha['cpf'],
            $primeiraLinha['nome'],
            $primeiraLinha['email'],
        );

        $telefones = array_filter($dadosAluno, fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null);
        foreach ($telefones as $telefone) {
            $aluno->adicionarTelefone($telefone['ddd'], $telefone['numero_telefone']);
        }

        return $aluno;
    }
}
