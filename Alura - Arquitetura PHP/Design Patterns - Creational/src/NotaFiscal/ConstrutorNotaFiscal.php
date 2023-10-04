<?php

namespace Alura\DesignPattern\NotaFiscal;

use Alura\DesignPattern\ItemOrcamento;

class ConstrutorNotaFiscal
{
    private NotaFiscal $notaFiscal;

    public function __construct()
    {
        $this->notaFiscal = new NotaFiscal();
        $this->notaFiscal->dataEmissao = new \DateTimeImmutable();
    }

    public function paraEmpresa(string $cnpj, string $razaoSocial)
    {
        $this->notaFiscal->cnpjEmpresa = $cnpj;
        $this->notaFiscal->razaoSocialEmpresa = $razaoSocial;
    }

    public function comItem(ItemOrcamento $item)
    {
        $this->notaFiscal->itens[] = $item;
    }

    public function comObservacoes(string $observacoes)
    {
        $this->notaFiscal->observacoes = $observacoes;
    }

    public function comDataEmissao(\DateTimeInterface $dataEmissao)
    {
        $this->notaFiscal->dataEmissao = $dataEmissao;
    }

    public function constroi(): NotaFiscal
    {
        return $this->notaFiscal;
    }
}
