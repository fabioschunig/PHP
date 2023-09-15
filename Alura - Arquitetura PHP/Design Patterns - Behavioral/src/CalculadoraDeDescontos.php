<?php

namespace Alura\DesignPattern;

use Alura\DesignPattern\Descontos\DescontoMaisDe5Itens;
use Alura\DesignPattern\Descontos\DescontoMaisDe500Reais;

class CalculadoraDeDescontos
{
    public function calculaDescontos(Orcamento $orcamento): float
    {
        $desconto5Itens = new DescontoMaisDe5Itens();
        $desconto = $desconto5Itens->calculaDesconto($orcamento);
        if ($desconto === 0) {
            $desconto500Reais = new DescontoMaisDe500Reais();
            $desconto = $desconto500Reais->calculaDesconto($orcamento);
        }

        return $desconto;
    }
}
