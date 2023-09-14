<?php

use Alura\DesignPattern\CalculadoraDeImpostos;
use Alura\DesignPattern\Impostos\ICMS;
use Alura\DesignPattern\Impostos\ISS;
use Alura\DesignPattern\Orcamento;

require 'vendor/autoload.php';

$calculadora  = new CalculadoraDeImpostos();

$orcamento = new Orcamento();
$orcamento->valor = 100;

echo $calculadora->calcula($orcamento, new ICMS()) . "\n";

echo $calculadora->calcula($orcamento, new ISS()) . "\n";
