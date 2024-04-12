<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

class MaximoTelefonesAtingido extends \DomainException
{
    public function __construct()
    {
        parent::__construct("Somente é permitido o máximo de 2 telefones por aluno");
    }
}
