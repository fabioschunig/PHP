<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoRepository;
use Alura\Arquitetura\Academico\Dominio\PublicadorDeEvento;

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
