<?php

use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido;

require 'vendor/autoload.php';

$pedidos = [];
// pequena otimização economiza 3MB de RAM
$hoje = new \DateTimeImmutable();
for ($i = 0; $i < 10000; $i++) {
    $pedido = new Pedido();
    $pedido->nomeCliente = md5((string) rand(1, 99999));
    $pedido->orcamento = new Orcamento;
    $pedido->dataFinalizacao = $hoje;

    $pedidos[] = $pedido;
}

$memory = memory_get_peak_usage() / 1024 / 1024;
echo $memory . ' MB' . PHP_EOL;
