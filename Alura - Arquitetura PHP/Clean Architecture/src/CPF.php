<?php

namespace Alura\Arquitetura;

class CPF implements \Stringable
{
    private string $numero;

    public function __construct(string $numero)
    {
        if (!$this->validarNumero($numero)) {
            throw new \InvalidArgumentException(
                'Número de CPF inválido'
            );
        }
        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return $this->numero;
    }

    // referência:
    // https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40
    private function validarNumero(string $numero): bool
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $numero);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
