<?php

namespace Alura\Arquitetura;

class CPF implements \Stringable
{
    private string $numero;

    public function __construct(string $numero)
    {
        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return $this->numero;
    }
}
