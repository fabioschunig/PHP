<?php

namespace Alura\Arquitetura\Testes\Aplicacao\Aluno;

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogAlunoMatriculado;
use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Academico\Infra\Aluno\AlunoRepositoryMemory;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;
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

        // listener
        $publicador = new PublicadorDeEvento();
        $publicador->adicionarOuvinte(new LogAlunoMatriculado());

        $repositorioAluno = new AlunoRepositoryMemory();
        $useCase = new MatricularAluno($repositorioAluno, $publicador);
        $useCase->executar($dadosAluno);

        $aluno = $repositorioAluno->buscarPorCpf(new CPF('123.456.789-10'));

        $this->assertSame('Teste nome aluno', (string) $aluno->nome());
        $this->assertSame('teste@email.com', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}
