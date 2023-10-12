<?php

namespace Alura\Arquitetura;

class Telefone implements \Stringable
{
    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->ddd = $ddd;
        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return "(" . $this->ddd . ") " . $this->numero;
    }
}
