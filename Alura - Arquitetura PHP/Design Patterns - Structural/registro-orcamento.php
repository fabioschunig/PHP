<?php

use Alura\DesignPattern\Http\CurlHttpAdapter;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\RegistroOrcamento;

require 'vendor/autoload.php';

$orcamento = new Orcamento();
$orcamento->valor = 123.45;
$orcamento->quantidadeItens = 7;
$orcamento->aprova();
$orcamento->finaliza();

$registroOrcamento = new RegistroOrcamento(new CurlHttpAdapter());
$registroOrcamento->registrar($orcamento);
