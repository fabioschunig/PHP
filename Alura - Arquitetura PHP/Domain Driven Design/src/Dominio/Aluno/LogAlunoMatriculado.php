<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Evento;
use Alura\Arquitetura\Dominio\OuvinteDeEvento;

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
