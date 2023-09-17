<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;

class Finalizado
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        throw new \DomainException("Orçamento finalizado não pode receber descontos");
    }
}
