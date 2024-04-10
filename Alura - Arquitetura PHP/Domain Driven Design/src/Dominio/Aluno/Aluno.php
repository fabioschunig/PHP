<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Email;

class Aluno
{
    private CPF $cpf;
    private string $nome;
    private Email $email;
    private array $telefones = array();

    public function __construct(CPF $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
    }

    public static function comCPFNomeEEmail(string $cpf, string $nome, string $email): self
    {
        return new Aluno(
            new CPF($cpf),
            $nome,
            new Email($email),
        );
    }

    public function adicionarTelefone(string $ddd, string $numero): self
    {
        if (count($this->telefones) === 2) {
            throw new MaximoTelefonesAtingido();
        }

        $this->telefones[] = new Telefone($ddd, $numero);

        return $this;
    }

    public function cpf(): CPF
    {
        return $this->cpf;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function telefones(): array
    {
        return $this->telefones;
    }
}
