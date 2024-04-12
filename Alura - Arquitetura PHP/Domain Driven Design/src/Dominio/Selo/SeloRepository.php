<?php

namespace Alura\Arquitetura\Dominio\Selo;

use Alura\Arquitetura\Dominio\CPF;

interface SeloRepository
{
    public function adiciona(Selo $selo);
    public function selosDeAlunoComCpf(CPF $cpf);
}
