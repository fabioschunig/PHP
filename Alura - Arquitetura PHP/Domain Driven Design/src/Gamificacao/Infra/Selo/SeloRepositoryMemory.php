<?php

namespace Alura\Arquitetura\Gamificacao\Infra\Selo;

use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\SeloRepository;

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
