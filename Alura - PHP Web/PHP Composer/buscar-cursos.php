#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

use Alura\BuscadorDeCursos\Buscador;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}

echo "Teste de classmap" . PHP_EOL;
echo Teste::mensagem();
echo PHP_EOL;

echo "TesteV2" . PHP_EOL;
echo TesteV2::mensagemV2();
echo PHP_EOL;

echo exibeMensagem("Mensagem de teste via function");
echo exibeMensagem("Segunda mensagem de teste via function");
