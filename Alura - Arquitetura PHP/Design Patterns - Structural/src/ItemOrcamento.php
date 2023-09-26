<?php

namespace Alura\DesignPattern;

class ItemOrcamento implements Orcavel
{
    public float $valor;

    public function valor(): float
    {
        // simula uma demora de API
        sleep(1);

        return $this->valor;
    }
}
