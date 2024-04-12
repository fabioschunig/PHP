<?php

namespace Alura\Arquitetura\Dominio\Aluno;

class MaximoTelefonesAtingido extends \DomainException
{
    public function __construct()
    {
        parent::__construct("Somente é permitido o máximo de 2 telefones por aluno");
    }
}
