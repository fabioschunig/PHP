<?php

namespace Alura\Arquitetura;

class CPF
{
    private string $numero;

    public function __construct(string $numero)
    {
        $this->numero = $numero;
    }
}
