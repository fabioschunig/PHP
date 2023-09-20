<?php

require 'vendor/autoload.php';

use Alura\DesignPattern\ListaDeOrcamentos;
use Alura\DesignPattern\Orcamento;

$orcamento1 = new Orcamento();
$orcamento1->quantidadeItens = 7;
$orcamento1->valor = 1500.75;
$orcamento1->aprova();

$orcamento2 = new Orcamento();
$orcamento2->quantidadeItens = 3;
$orcamento2->valor = 123.45;
$orcamento2->reprova();

$orcamento3 = new Orcamento();
$orcamento3->quantidadeItens = 5;
$orcamento3->valor = 741;
$orcamento3->aprova();
$orcamento3->finaliza();

$listaOrcamentos = new ListaDeOrcamentos();
$listaOrcamentos->addOrcamento($orcamento1);
$listaOrcamentos->addOrcamento($orcamento2);
$listaOrcamentos->addOrcamento($orcamento3);

foreach ($listaOrcamentos->orcamentos() as $orcamento) {
    echo "Valor: " . $orcamento->valor . PHP_EOL;
    echo "Estado: " . get_class($orcamento->estadoAtual) . PHP_EOL;
    echo "Qtd. Itens: " . $orcamento->quantidadeItens . PHP_EOL;

    echo PHP_EOL;
}
