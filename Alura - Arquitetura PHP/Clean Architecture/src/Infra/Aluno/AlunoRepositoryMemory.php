<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\AlunoRepository;

class AlunoRepositoryMemory implements AlunoRepository
{
    public function adicionar(Aluno $aluno): void
    {
    }

    public function buscarPorCpf(CPF $cpf): Aluno
    {
    }

    public function buscarTodos(): array
    {
    }
}
