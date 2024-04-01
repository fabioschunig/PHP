<?php

namespace Alura\Arquitetura\Infra\Indicacao;

use Alura\Arquitetura\Aplicacao\Indicacao\EnviaEmailIndicacao;
use Alura\Arquitetura\Dominio\Aluno\Aluno;

class EnviaEmailIndicacaoMailPhp implements EnviaEmailIndicacao
{
    public function enviarPara(Aluno $alunoIndicado): void
    {
        mail(
            $alunoIndicado->email(),
            "Indicação",
            "Indicação de aluno",
        );
    }
}
