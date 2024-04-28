<?php

namespace Alura\Arquitetura\Testes\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\MaximoTelefonesAtingido;
use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    protected function setUp(): void
    {
        $this->aluno = new Aluno(
            $this->createStub(CPF::class),
            '',
            $this->createStub(Email::class),
        );
    }

    public function testAdicionarTelefoneAbaixoDoMaximo()
    {
        $this->aluno->adicionarTelefone('11', '111111111');
        $this->aluno->adicionarTelefone('99', '999999999');

        $this->assertCount(2, $this->aluno->telefones());
    }

    public function testAdicionarTelefoneAcimaDoMaximo()
    {
        $this->expectException(MaximoTelefonesAtingido::class);
        $this->expectExceptionMessage("Somente é permitido o máximo de 2 telefones por aluno");

        $this->aluno->adicionarTelefone('11', '111111111');
        $this->aluno->adicionarTelefone('55', '555555555');
        $this->aluno->adicionarTelefone('99', '999999999');
    }
}
