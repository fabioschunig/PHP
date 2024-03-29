<?php

namespace Alura\Arquitetura\Testes\Aplicacao\Aluno;

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Infra\Aluno\AlunoRepositoryMemory;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDto(
            '123.456.789-10',
            'Teste nome aluno',
            'teste@email.com',
        );

        $repositorioAluno = new AlunoRepositoryMemory();
        $useCase = new MatricularAluno($repositorioAluno);
        $useCase->executar($dadosAluno);

        $aluno = $repositorioAluno->buscarPorCpf(new CPF('123.456.789-10'));

        $this->assertSame('Teste nome aluno', (string) $aluno->nome());
        $this->assertSame('teste@email.com', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}
