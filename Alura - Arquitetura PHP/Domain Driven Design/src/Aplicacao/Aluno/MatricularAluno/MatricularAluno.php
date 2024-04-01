<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoRepository;

class MatricularAluno
{
    private AlunoRepository $repository;

    public function __construct(AlunoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function executar(MatricularAlunoDto $dados)
    {
        $aluno = Aluno::comCPFNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $this->repository->adicionar($aluno);
    }
}
