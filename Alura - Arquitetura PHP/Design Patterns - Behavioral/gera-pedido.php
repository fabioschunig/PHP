<?php

use Alura\DesignPattern\{Orcamento, Pedido};

require 'vendor/autoload.php';

$valorOrcamento = $argv[1];
$numeroItens = $argv[2];
$nomeCliente = $argv[3];

$orcamento = new Orcamento();
$orcamento->quantidadeItens = $numeroItens;
$orcamento->valor = $valorOrcamento;

$pedido = new Pedido();
$pedido->dataFinalizacao = new \DateTimeImmutable();
$pedido->nomeCliente = $nomeCliente;
$pedido->orcamento = $orcamento;

echo "Cria pedido no banco de dados " . PHP_EOL;
echo "Envia e-mail para o cliente " . PHP_EOL;
