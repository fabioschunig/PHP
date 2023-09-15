<?php

namespace Alura\DesignPattern\Descontos;

use Alura\DesignPattern\Orcamento;

class DescontoMaisDe500Reais
{
    public function calculaDesconto(Orcamento $orcamento)
    {
        if ($orcamento->valor > 500) {
            return $orcamento->valor * 0.05;
        }

        return 0;
    }
}
