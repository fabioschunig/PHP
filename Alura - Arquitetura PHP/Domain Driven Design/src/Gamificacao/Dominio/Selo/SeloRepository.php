<?php

namespace Alura\Arquitetura\Dominio\Selo;

use Alura\Arquitetura\Dominio\CPF;

interface SeloRepository
{
    public function adiciona(Selo $selo): void;
    public function selosDeAlunoComCpf(CPF $cpf): array;
}
