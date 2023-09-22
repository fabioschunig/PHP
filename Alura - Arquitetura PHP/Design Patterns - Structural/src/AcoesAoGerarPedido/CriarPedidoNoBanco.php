<?php

namespace Alura\DesignPattern\AcoesAoGerarPedido;

use Alura\DesignPattern\Pedido;

class CriarPedidoNoBanco implements AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): void
    {
        $dataFinalizacao = $pedido->dataFinalizacao->format('d/m/Y');
        echo "Salvando pedido banco de dados - criado em $dataFinalizacao" . PHP_EOL;
    }
}
