<?php

namespace Alura\DesignPattern\Impostos;

use Alura\DesignPattern\Orcamento;

class ISS implements Imposto
{
    public function calculaImposto(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.06;
    }
}
