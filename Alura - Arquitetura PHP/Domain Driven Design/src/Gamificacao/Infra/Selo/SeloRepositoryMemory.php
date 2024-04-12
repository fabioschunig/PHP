<?php

namespace Alura\Arquitetura\Infra\Selo;

use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Selo\Selo;
use Alura\Arquitetura\Dominio\Selo\SeloRepository;

class SeloRepositoryMemory implements SeloRepository
{
    private array $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function selosDeAlunoComCpf(CPF $cpf): array
    {
        return array_filter(
            $this->selos,
            fn (Selo $selo) => $selo->cpfAluno() == $cpf,
        );
    }
}
