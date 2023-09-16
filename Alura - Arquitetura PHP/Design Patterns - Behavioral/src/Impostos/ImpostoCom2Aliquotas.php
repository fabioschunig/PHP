<?php

namespace Alura\DesignPattern\Impostos;

use Alura\DesignPattern\Orcamento;

abstract class ImpostoCom2Aliquotas implements Imposto
{
    // common code extracted with Template Method Design Pattern
    public function calculaImposto(Orcamento $orcamento): float
    {
        if ($this->deveAplicarTaxaMaxima($orcamento)) {
            return $this->calculaTaxaMaxima($orcamento);
        }

        return $this->calculaTaxaMinima($orcamento);
    }

    // child classes just need to implement their specific rules
    abstract protected function deveAplicarTaxaMaxima(Orcamento $orcamento): bool;
    abstract protected function calculaTaxaMaxima(Orcamento $orcamento): float;
    abstract protected function calculaTaxaMinima(Orcamento $orcamento): float;
}
