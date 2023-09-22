<?php

use Alura\DesignPattern\Http\CurlHttpAdapter;
use Alura\DesignPattern\Http\ReactPHPHttpAdapter;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\RegistroOrcamento;

require 'vendor/autoload.php';

$orcamento = new Orcamento();
$orcamento->valor = 123.45;
$orcamento->quantidadeItens = 7;
$orcamento->aprova();
$orcamento->finaliza();

// easily changed API communication with Adapter Design Pattern
//$registroOrcamento = new RegistroOrcamento(new CurlHttpAdapter());
$registroOrcamento = new RegistroOrcamento(new ReactPHPHttpAdapter());

$registroOrcamento->registrar($orcamento);
