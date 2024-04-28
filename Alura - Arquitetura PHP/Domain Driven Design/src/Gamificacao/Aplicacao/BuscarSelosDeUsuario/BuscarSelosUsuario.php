<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosDeUsuario;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\SeloRepository;
use Alura\Arquitetura\Shared\Dominio\CPF;

class BuscarSelosUsuario
{
    private SeloRepository $repositorioDeSelo;

    public function __construct(SeloRepository $repositorioDeSelo)
    {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }

    public function execute(BuscarSelosUsuarioDto $dados)
    {
        $cpfAluno = new CPF($dados->cpfAluno);

        return $this->repositorioDeSelo->selosDeAlunoComCpf($cpfAluno);
    }
}
