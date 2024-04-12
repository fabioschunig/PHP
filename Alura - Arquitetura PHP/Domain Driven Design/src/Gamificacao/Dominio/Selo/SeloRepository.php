<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;

use Alura\Arquitetura\Academico\Dominio\CPF;

interface SeloRepository
{
    public function adiciona(Selo $selo): void;
    public function selosDeAlunoComCpf(CPF $cpf): array;
}
