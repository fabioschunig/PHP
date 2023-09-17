<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;

class Aprovado
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.02;
    }

    public function finaliza(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = 'FINALIZADO';
    }

    public function reprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = 'REPROVADO';
    }
}
