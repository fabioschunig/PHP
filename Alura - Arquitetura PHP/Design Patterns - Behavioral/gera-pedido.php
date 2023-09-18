<?php

use Alura\DesignPattern\GerarPedido;
use Alura\DesignPattern\GerarPedidoHandler;

require 'vendor/autoload.php';

// command line example:
// $ php gera-pedido.php 123.45 7 "Fabio"
$valorOrcamento = $argv[1];
$numeroItens = $argv[2];
$nomeCliente = $argv[3];

$gerarPedido = new GerarPedido(
    $valorOrcamento,
    $numeroItens,
    $nomeCliente,
);
$gerarPedidoHander = new GerarPedidoHandler();
$gerarPedidoHander->execute($gerarPedido);
