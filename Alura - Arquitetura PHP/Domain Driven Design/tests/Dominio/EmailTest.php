<?php

namespace Alura\Arquitetura\Testes\Dominio;

use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailComNumeroNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('e-mail inválido');
    }

    public function testEmailDevePoderSerRepresentadoComoString()
    {
        $email = new Email('endereco@exemplo.com');
        $this->assertSame('endereco@exemplo.com', (string) $email);
    }
}
