<?php

namespace Alura\Arquitetura\Academico\Infra\Indicacao;

use Alura\Arquitetura\Academico\Aplicacao\Indicacao\EnviaEmailIndicacao;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

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
