<?php

namespace Alura\Arquitetura\Testes;

use Alura\Arquitetura\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testTelefoneComDDDNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('DDD inválido');
        new Telefone('333', '123456789');
    }

    public function testTelefoneComNumeroNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Número de telefone inválido');
        new Telefone('22', '1234567');
    }

    public function testTelefone9DigitosPoderSerRepresentadoComoString()
    {
        $telefone = new Telefone('22', '123456789');
        $this->assertSame('(22) 123456789', (string) $telefone);
    }

    public function testTelefone8DigitosPoderSerRepresentadoComoString()
    {
        $telefone = new Telefone('22', '12345678');
        $this->assertSame('(22) 12345678', (string) $telefone);
    }
}
