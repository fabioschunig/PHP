<?php

use Alura\DesignPattern\Pedido\TemplatePedido;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido\CriadorDePedido;
use Alura\DesignPattern\Pedido\Pedido;

require 'vendor/autoload.php';

$pedidos = [];

// otimização com separação de dados extrínsecos
//$template = new TemplatePedido();
//$template->dataFinalizacao = new \DateTimeImmutable();
//$template->nomeCliente = md5((string) rand(1, 99999));

// mudado para objeto imutável
//$template = new TemplatePedido(md5((string) rand(1, 99999)), new \DateTimeImmutable());

// Factory
$criadorPedido = new CriadorDePedido();

for ($i = 0; $i < 10000; $i++) {
    $orcamento = new Orcamento;
    $pedido = $criadorPedido->criaPedido(
        'Fabio',
        date('Y-m-d'),
        $orcamento,
    );

    $pedidos[] = $pedido;
}

$memory = memory_get_peak_usage() / 1024 / 1024;
echo $memory . ' MB' . PHP_EOL;
