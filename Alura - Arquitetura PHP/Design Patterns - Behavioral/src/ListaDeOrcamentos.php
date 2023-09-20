<?php

namespace Alura\DesignPattern;

use ArrayIterator;
use Traversable;

class ListaDeOrcamentos implements \IteratorAggregate
{
    /** @var Orcamento[] */
    private array $orcamentos;

    public function __construct()
    {
        $this->orcamentos = [];
    }

    public function addOrcamento(Orcamento $orcamento)
    {
        $this->orcamentos[] = $orcamento;
    }

    public function getIterator(): ArrayIterator
    {
        return new \ArrayIterator($this->orcamentos);
    }
}
