<?php

use Alura\DesignPattern\DadosExtrinsecosPedido;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido;

require 'vendor/autoload.php';

$pedidos = [];

// otimização com separação de dados extrínsecos
$dados = new DadosExtrinsecosPedido();
$dados->dataFinalizacao = new \DateTimeImmutable();
$dados->nomeCliente = md5((string) rand(1, 99999));

for ($i = 0; $i < 10000; $i++) {
    $pedido = new Pedido();
    $pedido->dados = $dados;
    $pedido->orcamento = new Orcamento;

    $pedidos[] = $pedido;
}

$memory = memory_get_peak_usage() / 1024 / 1024;
echo $memory . ' MB' . PHP_EOL;
