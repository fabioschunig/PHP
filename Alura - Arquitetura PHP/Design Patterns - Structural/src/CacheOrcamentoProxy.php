<?php

namespace Alura\DesignPattern;

class CacheOrcamentoProxy extends Orcamento
{
    private float $valorCache = 0;
    private Orcamento $orcamento;

    public function __construct(Orcamento $orcamento)
    {
        $this->orcamento = $orcamento;
    }

    public function addItem(Orcavel $item)
    {
        throw new \DomainException(
            'Não é possível adicinar itens em um cache de orçamento'
        );
    }

    public function valor(): float
    {
        if ($this->valorCache == 0) {
            $this->valorCache = $this->orcamento->valor();
        }

        return $this->valorCache;
    }
}
