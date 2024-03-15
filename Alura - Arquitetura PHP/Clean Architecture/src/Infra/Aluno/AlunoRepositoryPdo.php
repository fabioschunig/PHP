<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoRepository;
use Alura\Arquitetura\Dominio\CPF;

class AlunoRepositoryPdo implements AlunoRepository
{
    public function adicionar(Aluno $aluno): void
    {
        //
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
