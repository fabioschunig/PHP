<?php

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscal;

require 'vendor/autoload.php';

$builder = new ConstrutorNotaFiscal();

$notaFiscal = $builder->paraEmpresa('12.3456.789/0001-00', 'Empresa de testes')
    ->comItem(new ItemOrcamento())
    ->comItem(new ItemOrcamento())
    ->comItem(new ItemOrcamento())
    ->comObservacoes('Nota fiscal gerado com um construtor')
    ->constroi();

print_r($notaFiscal);
