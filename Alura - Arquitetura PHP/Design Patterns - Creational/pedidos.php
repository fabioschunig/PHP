<?php

use Alura\DesignPattern\Pedido\DadosExtrinsecosPedido;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido\Pedido;

require 'vendor/autoload.php';

$pedidos = [];

// otimização com separação de dados extrínsecos
//$dados = new DadosExtrinsecosPedido();
//$dados->dataFinalizacao = new \DateTimeImmutable();
//$dados->nomeCliente = md5((string) rand(1, 99999));

// mudado para objeto imutável
$dados = new DadosExtrinsecosPedido(md5((string) rand(1, 99999)), new \DateTimeImmutable());

for ($i = 0; $i < 10000; $i++) {
    $pedido = new Pedido();
    $pedido->dados = $dados;
    $pedido->orcamento = new Orcamento;

    $pedidos[] = $pedido;
}

$memory = memory_get_peak_usage() / 1024 / 1024;
echo $memory . ' MB' . PHP_EOL;
