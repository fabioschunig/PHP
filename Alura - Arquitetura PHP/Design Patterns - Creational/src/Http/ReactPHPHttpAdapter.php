<?php

namespace Alura\DesignPattern\Http;

class ReactPHPHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        // instância do react PHP
        // prepara dados
        // faz a requisição
        echo "ReactPHP http adapter" . PHP_EOL;
    }
}
