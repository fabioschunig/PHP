<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;

class EmAprovacao extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.05;
    }

    public function aprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = 'APROVADO';
    }
}
