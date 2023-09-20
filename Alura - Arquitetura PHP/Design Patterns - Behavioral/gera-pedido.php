<?php

use Alura\DesignPattern\AcoesAoGerarPedido\CriarPedidoNoBanco;
use Alura\DesignPattern\AcoesAoGerarPedido\EnviarPedidoPorEmail;
use Alura\DesignPattern\AcoesAoGerarPedido\LogGerarPedido;
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
// add observer list
$gerarPedidoHander->adicionarAcaoAposGerarPedido(new CriarPedidoNoBanco());
$gerarPedidoHander->adicionarAcaoAposGerarPedido(new LogGerarPedido());
$gerarPedidoHander->adicionarAcaoAposGerarPedido(new EnviarPedidoPorEmail());
$gerarPedidoHander->execute($gerarPedido);
