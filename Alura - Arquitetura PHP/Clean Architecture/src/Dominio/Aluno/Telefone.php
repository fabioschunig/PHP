<?php

namespace Alura\Arquitetura\Dominio\Aluno;

class Telefone implements \Stringable
{
    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->setDdd($ddd);
        $this->setNumero($numero);
    }

    public function __toString(): string
    {
        return "(" . $this->ddd . ") " . $this->numero;
    }

    public function setDdd(string $ddd): void
    {
        if (preg_match('/\b\d{2}\b/', $ddd) !== 1) {
            throw new \InvalidArgumentException(
                'DDD inválido'
            );
        }

        $this->ddd = $ddd;
    }

    public function setNumero(string $numero): void
    {
        if (preg_match('/\b\d{8,9}\b/', $numero) !== 1) {
            throw new \InvalidArgumentException(
                'Número de telefone inválido'
            );
        }

        $this->numero = $numero;
    }
}
