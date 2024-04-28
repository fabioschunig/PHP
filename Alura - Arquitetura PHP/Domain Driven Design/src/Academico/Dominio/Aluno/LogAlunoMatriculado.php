<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio\Evento\Evento;
use Alura\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;

class LogAlunoMatriculado extends OuvinteDeEvento
{
    /** @param AlunoMatriculado $alunoMatriculado */
    public function reageAo(Evento $alunoMatriculado): void
    {
        fprintf(
            STDERR,
            'Aluno com CPF %s foi matriculado em %s',
            (string) $alunoMatriculado->cpfAluno(),
            $alunoMatriculado->momento()->format('d/m/Y'),
        );
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento instanceof AlunoMatriculado;
    }
}
