<?php

namespace Alura\Arquitetura;

class Email implements \Stringable
{
    private string $endereco;

    public function __construct(string $endereco)
    {
        $this->endereco = $endereco;
    }

    public function __toString(): string
    {
        return $this->endereco;
    }
}
