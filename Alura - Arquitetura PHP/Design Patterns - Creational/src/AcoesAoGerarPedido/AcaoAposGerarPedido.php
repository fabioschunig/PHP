<?php

namespace Alura\DesignPattern\AcoesAoGerarPedido;

use Alura\DesignPattern\Pedido\Pedido;

interface AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): void;
}
