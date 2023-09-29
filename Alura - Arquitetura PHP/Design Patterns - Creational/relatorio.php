<?php

require 'vendor/autoload.php';

use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido\Pedido;
use Alura\DesignPattern\Relatorio\{OrcamentoExportado, PedidoExportado};
use Alura\DesignPattern\Relatorio\{ArquivoXmlExportado, ArquivoZipExportado};

// Orcamento
$orcamento = new Orcamento();
$orcamento->valor = 345.67;
$orcamento->quantidadeItens = 7;

// Orcamento export
$orcamentoExportado = new OrcamentoExportado($orcamento);

// export Orcamento as XML
$exportXML = new ArquivoXmlExportado('orcamento');
echo $exportXML->salvar($orcamentoExportado) . PHP_EOL;

// export Orcamento as Zip
$exportZip = new ArquivoZipExportado('orcamento.interno');
echo $exportZip->salvar($orcamentoExportado) . PHP_EOL;

// Pedido
$pedido = new Pedido();
$pedido->dataFinalizacao = new DateTimeImmutable();
$pedido->nomeCliente = 'Fabio';

// Pedido export
$pedidoExportado = new PedidoExportado($pedido);

// same instances of exportXML and exportZip can be used with Bridge Design Pattern:

// export Pedido as XML
echo $exportXML->salvar($pedidoExportado) . PHP_EOL;

// export Pedido as Zip
echo $exportZip->salvar($pedidoExportado) . PHP_EOL;
