<?php

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscalServico;

require 'vendor/autoload.php';

$builder = new ConstrutorNotaFiscalServico();

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

echo "Nota fiscal:" . PHP_EOL;
var_dump($notaFiscal);

//$notaFiscal2 = $notaFiscal->clonar();
$notaFiscal2 = clone $notaFiscal;

$item4 = new ItemOrcamento();
$item4->valor = 135;

$notaFiscal2->itens[] = $item4;

echo "Nota fiscal clone:" . PHP_EOL;
var_dump($notaFiscal2);
