<?php

namespace Alura\DesignPattern\Relatorio;

use Alura\DesignPattern\Orcamento;

class OrcamentoXml
{
    public function exportar(Orcamento $orcamento): string
    {
        $elementOrcamento = new \SimpleXMLElement('<orcamento/>');
        $elementOrcamento->addChild('valor', $orcamento->valor);
        $elementOrcamento->addChild('quantidade_itens', $orcamento->quantidadeItens);

        return $elementOrcamento->asXML();
    }
}
