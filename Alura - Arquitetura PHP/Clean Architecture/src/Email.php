<?php

namespace Alura\Arquitetura;

class Email
{
    private string $endereco;

    public function __construct(string $endereco)
    {
        $this->endereco = $endereco;
    }
}
