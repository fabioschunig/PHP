<?php

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscal;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscalProduto;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscalServico;

require 'vendor/autoload.php';

$builder = new ConstrutorNotaFiscalProduto();
// $builder = new ConstrutorNotaFiscalServico();

$item1 = new ItemOrcamento();
$item1->valor = 500;

$item2 = new ItemOrcamento();
$item2->valor = 350;

$item3 = new ItemOrcamento();
$item3->valor = 700;

$notaFiscal = $builder->paraEmpresa('12.3456.789/0001-00', 'Empresa de testes')
    ->comItem($item1)
    ->comItem($item2)
    ->comItem($item3)
    ->comObservacoes('Nota fiscal gerado com um construtor')
    ->constroi();

print_r($notaFiscal);

echo "Valor impostos:" . PHP_EOL;
echo $notaFiscal->valorImpostos . PHP_EOL;
