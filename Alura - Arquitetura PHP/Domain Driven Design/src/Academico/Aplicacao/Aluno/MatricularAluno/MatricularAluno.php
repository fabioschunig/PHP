<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Dominio\Aluno\AlunoRepository;
use Alura\Arquitetura\Dominio\PublicadorDeEvento;

class MatricularAluno
{
    private AlunoRepository $repository;
    private PublicadorDeEvento $publicador;

    public function __construct(AlunoRepository $repository, PublicadorDeEvento $publicador)
    {
        $this->repository = $repository;
        $this->publicador = $publicador;
    }

    public function executar(MatricularAlunoDto $dados)
    {
        $aluno = Aluno::comCPFNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $this->repository->adicionar($aluno);

        $evento = new AlunoMatriculado($aluno->cpf());
        $this->publicador->publicar($evento);
    }
}
