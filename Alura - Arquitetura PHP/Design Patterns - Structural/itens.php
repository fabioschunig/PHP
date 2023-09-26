<?php

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\Orcamento;

require 'vendor/autoload.php';

$orcamento = new Orcamento();

$item1 = new ItemOrcamento();
$item1->valor = 300;

$item2 = new ItemOrcamento();
$item2->valor = 500;

$orcamento->addItem($item1);
$orcamento->addItem($item2);

// old Orcamento
$orcamentoAntigo = new Orcamento();
$item3 = new ItemOrcamento();
$item3->valor = 150;
$orcamentoAntigo->addItem($item3);

// old old Orcamento
$orcamentoMaisAntigo = new Orcamento();
$item4 = new ItemOrcamento();
$item4->valor = 50;
$item5 = new ItemOrcamento();
$item5->valor = 100;
$orcamentoMaisAntigo->addItem($item4);
$orcamentoMaisAntigo->addItem($item5);

// a tree of items can be created with Composite Design Pattern
$orcamentoAntigo->addItem($orcamentoMaisAntigo);
$orcamento->addItem($orcamentoAntigo);

echo "Valor orçamento:" . PHP_EOL;
echo $orcamento->valor() . PHP_EOL;
// demora alguns segundos devido ao sleep
echo $orcamento->valor() . PHP_EOL;
