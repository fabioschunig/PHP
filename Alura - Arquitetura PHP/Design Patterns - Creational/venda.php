<?php

use Alura\DesignPattern\Venda\VendaServicoFactory;

require 'vendor/autoload.php';

$vendaFactory = new VendaServicoFactory('Fabio');
$venda = $vendaFactory->criarVenda();
$imposto = $vendaFactory->imposto();

var_dump($venda);
var_dump($imposto);
