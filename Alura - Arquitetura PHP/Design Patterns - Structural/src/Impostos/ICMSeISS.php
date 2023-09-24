<?php

namespace Alura\DesignPattern\Impostos;

use Alura\DesignPattern\Orcamento;

class ICMSeISS implements Imposto
{
    public function calculaImposto(Orcamento $orcamento): float
    {
        return (new ICMS())->calculaImposto($orcamento)
            +
            (new ISS())->calculaImposto($orcamento);
    }
}
