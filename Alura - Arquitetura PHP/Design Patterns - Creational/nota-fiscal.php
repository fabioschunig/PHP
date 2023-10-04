<?php

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscal;

require 'vendor/autoload.php';

$builder = new ConstrutorNotaFiscal();
$builder->paraEmpresa('12.3456.789/0001-00', 'Empresa de testes');
$builder->comItem(new ItemOrcamento());
$builder->comItem(new ItemOrcamento());
$builder->comItem(new ItemOrcamento());
$builder->comObservacoes('Nota fiscal gerado com um construtor');

print_r($builder);

$notaFiscal = $builder->constroi();

print_r($notaFiscal);
