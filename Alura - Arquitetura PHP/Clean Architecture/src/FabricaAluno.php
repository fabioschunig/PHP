<?php

namespace Alura\Arquitetura;

class FabricaAluno
{
    private Aluno $aluno;

    public function comCPFEmailENome(string $cpf, string $email, string $nome): self
    {
        $this->aluno = Aluno::comCPFNomeEEmail($cpf, $nome, $email);

        return $this;
    }

    public function adicionaTelefone(string $ddd, string $numero): self
    {
        $this->aluno->adicionarTelefone($ddd, $numero);

        return $this;
    }

    public function aluno(): Aluno
    {
        return $this->aluno;
    }
}
