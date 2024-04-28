<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\SeloRepository;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento;
use Alura\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;

class GeraSeloDeNovato extends OuvinteDeEvento
{
    private SeloRepository $repositorioDeSelo;

    public function __construct(SeloRepository $repositorioDeSelo)
    {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return get_class($evento) === 'Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado';
    }

    public function reageAo(Evento $evento): void
    {
        $array = $evento->jsonSerialize();
        $cpf = $array['cpfAluno'];

        $selo = new Selo($cpf, 'Novato');
        $this->repositorioDeSelo->adiciona($selo);
    }
}
