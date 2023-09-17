<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;

class Reprovado
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        throw new \DomainException("Orçamento reprovado não pode receber descontos");
    }
}
