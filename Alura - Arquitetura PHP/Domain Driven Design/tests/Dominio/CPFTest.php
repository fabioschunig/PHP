<?php

namespace Alura\Arquitetura\Testes\Dominio;

use Alura\Arquitetura\Academico\Dominio\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function testCPFComNumeroNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new CPF('1234567890');
    }

    public function testCPFDevePoderSerRepresentadoComoString()
    {
        $cpf = new CPF('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}
