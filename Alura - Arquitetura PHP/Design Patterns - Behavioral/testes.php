<?php

use Alura\DesignPattern\CalculadoraDeDescontos;
use Alura\DesignPattern\CalculadoraDeImpostos;
use Alura\DesignPattern\Impostos\ICMS;
use Alura\DesignPattern\Impostos\ISS;
use Alura\DesignPattern\Orcamento;

require 'vendor/autoload.php';

$orcamento = new Orcamento();
$orcamento->valor = 100;

// Testes para CalculadoraDeImpostos
$calculadoraImpostos  = new CalculadoraDeImpostos();

echo "CalculadoraDeImpostos - ICMS: \n";
echo $calculadoraImpostos->calcula($orcamento, new ICMS()) . "\n";

echo "CalculadoraDeImpostos - ISS: \n";
echo $calculadoraImpostos->calcula($orcamento, new ISS()) . "\n";

// Testes para CalculadoraDeDescontos
$calculadoraDescontos  = new CalculadoraDeDescontos();

$orcamento->valor = 200;

$orcamento->quantidadeItens = 5;
echo "CalculadoraDeDescontos - 5 itens - 200 reais: \n";
echo $calculadoraDescontos->calculaDescontos($orcamento) . "\n";

$orcamento->quantidadeItens = 7;
echo "CalculadoraDeDescontos - 7 itens - 200 reais: \n";
echo $calculadoraDescontos->calculaDescontos($orcamento) . "\n";

$orcamento->valor = 750;

$orcamento->quantidadeItens = 5;
echo "CalculadoraDeDescontos - 5 itens - 750 reais: \n";
echo $calculadoraDescontos->calculaDescontos($orcamento) . "\n";

$orcamento->quantidadeItens = 7;
echo "CalculadoraDeDescontos - 7 itens - 750 reais: \n";
echo $calculadoraDescontos->calculaDescontos($orcamento) . "\n";
