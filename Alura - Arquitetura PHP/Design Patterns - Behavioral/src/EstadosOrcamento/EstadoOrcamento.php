<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;

abstract class EstadoOrcamento
{
    abstract public function calculaDescontoExtra(Orcamento $orcamento): float;
}
