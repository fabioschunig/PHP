<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaPhp implements CifradorDeSenha
{
    public function cifrar(string $senha): string
    {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function verificar(string $senhaEmText, string $senhaCifrada): bool
    {
        return password_verify($senhaEmText, $senhaCifrada);
    }
}
