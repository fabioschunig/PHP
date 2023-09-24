<?php

use Alura\DesignPattern\CalculadoraDeDescontos;
use Alura\DesignPattern\CalculadoraDeImpostos;
use Alura\DesignPattern\Impostos\ICMS;
use Alura\DesignPattern\Impostos\ISS;
use Alura\DesignPattern\Impostos\ICPP;
use Alura\DesignPattern\Impostos\IKCV;
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

// cálculo de vários impostos
echo "CalculadoraDeImpostos - ICMS + ISS: \n";
echo $calculadoraImpostos->calcula($orcamento, new ICMS(new ISS())) . "\n";

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

// Testes para novos impostos
$orcamento->valor = 750;

echo "CalculadoraDeImpostos - ICPP - mais que 500 reais: \n";
echo $calculadoraImpostos->calcula($orcamento, new ICPP()) . "\n";

$orcamento->valor = 400;

echo "CalculadoraDeImpostos - ICPP - menos de 500 reais: \n";
echo $calculadoraImpostos->calcula($orcamento, new ICPP()) . "\n";

$orcamento->valor = 400;
$orcamento->quantidadeItens = 2;

echo "CalculadoraDeImpostos - IKCV - 2 itens - mais que 300 reais: \n";
echo $calculadoraImpostos->calcula($orcamento, new IKCV()) . "\n";

$orcamento->quantidadeItens = 5;

echo "CalculadoraDeImpostos - IKCV - 5 itens - mais que 300 reais: \n";
echo $calculadoraImpostos->calcula($orcamento, new IKCV()) . "\n";

$orcamento->valor = 250;
$orcamento->quantidadeItens = 2;

echo "CalculadoraDeImpostos - IKCV - 2 itens - menos de 300 reais: \n";
echo $calculadoraImpostos->calcula($orcamento, new IKCV()) . "\n";

$orcamento->quantidadeItens = 5;

echo "CalculadoraDeImpostos - IKCV - 5 itens - menos de 300 reais: \n";
echo $calculadoraImpostos->calcula($orcamento, new IKCV()) . "\n";

// Testes para estadoAtual
echo "Valor orçamento: \n";
echo $orcamento->valor . "\n";

// Default state is EmAprovacao
// $orcamento->estadoAtual = 'EM_APROVACAO';
echo "Valor desconto com estado EM-APROVAÇÃO: \n";
echo $orcamento->estadoAtual->calculaDescontoExtra($orcamento) . "\n";
echo "Estado atual: " . $orcamento->estadoAtual::class . "\n";

//$orcamento->estadoAtual = 'APROVADO';
$orcamento->aprova();
echo "Valor desconto com estado APROVADO: \n";
echo $orcamento->estadoAtual->calculaDescontoExtra($orcamento) . "\n";
echo "Estado atual: " . $orcamento->estadoAtual::class . "\n";

//$orcamento->estadoAtual = 'REPROVADO';
echo "Valor desconto com estado REPROVADO: \n";
try {
    $orcamento->reprova();
    echo "Estado atual: " . $orcamento->estadoAtual::class . "\n";
    echo $orcamento->estadoAtual->calculaDescontoExtra($orcamento) . "\n";
} catch (\Throwable $th) {
    echo $th->getMessage() . "\n";
}

//$orcamento->estadoAtual = 'FINALIZADO';
echo "Valor desconto com estado FINALIZADO: \n";
try {
    $orcamento->finaliza();
    echo "Estado atual: " . $orcamento->estadoAtual::class . "\n";
    echo $orcamento->estadoAtual->calculaDescontoExtra($orcamento) . "\n";
} catch (\Throwable $th) {
    echo $th->getMessage() . "\n";
}
