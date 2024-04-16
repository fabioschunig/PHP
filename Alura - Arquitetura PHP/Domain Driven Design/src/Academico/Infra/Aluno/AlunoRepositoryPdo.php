<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoNaoEncontrado;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoRepository;
use Alura\Arquitetura\Academico\Dominio\Aluno\Telefone;
use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Academico\Dominio\Email;

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
        $aluno = $this->buscarAlunos($cpf)[0];

        return $aluno;
    }

    public function buscarTodos(): array
    {
        return $this->buscarAlunos();
    }

    private function buscarAlunos(CPF|null $cpf = null): array
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

        $listaCpf = array_unique(array_column($dadosAlunos, 'cpf'));

        foreach ($listaCpf as $cpf) {
            $dadosCpf = array_filter(
                $dadosAlunos,
                fn ($dados) => $dados['cpf'] === $cpf,
            );
            $alunos[] = $this->mapearAluno($dadosCpf);
        }

        return $alunos;
    }

    private function mapearAluno(array $dadosAluno): Aluno
    {
        $primeiraLinha = $dadosAluno[array_key_first($dadosAluno)];
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
