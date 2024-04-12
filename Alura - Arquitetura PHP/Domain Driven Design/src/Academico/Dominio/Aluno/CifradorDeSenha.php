<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

interface CifradorDeSenha
{
    public function cifrar(string $senha): string;
    public function verificar(string $senhaEmText, string $senhaCifrada): bool;
}
