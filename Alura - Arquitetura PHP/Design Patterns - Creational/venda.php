<?php

use Alura\DesignPattern\Venda\VendaProdutoFactory;
use Alura\DesignPattern\Venda\VendaServicoFactory;

require 'vendor/autoload.php';

$vendaFactory = new VendaServicoFactory('Fabio');
$venda = $vendaFactory->criarVenda();
$imposto = $vendaFactory->imposto();

var_dump($venda);
// dumps:
// object(Alura\DesignPattern\Venda\VendaServico)

var_dump($imposto);
// dumps:
// object(Alura\DesignPattern\Impostos\ISS)


$vendaFactory = new VendaProdutoFactory(12345);
$venda = $vendaFactory->criarVenda();
$imposto = $vendaFactory->imposto();

var_dump($venda);
// dumps:
// object(Alura\DesignPattern\Venda\VendaProduto)

var_dump($imposto);
// dumps:
// object(Alura\DesignPattern\Impostos\ICMS)
