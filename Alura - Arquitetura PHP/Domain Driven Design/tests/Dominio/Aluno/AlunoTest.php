<?php

namespace Alura\Arquitetura\Testes\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\MaximoTelefonesAtingido;
use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    public function testAdicionarTelefoneAbaixoDoMaximo()
    {
        $aluno = new Aluno(
            new CPF('123.456.789-10'),
            'Teste telefone',
            new Email('teste@email.com'),
        );

        $aluno->adicionarTelefone('11', '111111111');
        $aluno->adicionarTelefone('99', '999999999');
        $this->assertSame(2, count($aluno->telefones()));
    }

    public function testAdicionarTelefoneAcimaDoMaximo()
    {
        $this->expectException(MaximoTelefonesAtingido::class);
        $this->expectExceptionMessage("Somente é permitido o máximo de 2 telefones por aluno");

        $aluno = new Aluno(
            new CPF('123.456.789-10'),
            'Teste telefone',
            new Email('teste@email.com'),
        );

        $aluno->adicionarTelefone('11', '111111111');
        $aluno->adicionarTelefone('55', '555555555');
        $aluno->adicionarTelefone('99', '999999999');
    }
}
