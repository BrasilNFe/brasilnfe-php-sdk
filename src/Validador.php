<?php

namespace BrasilNFeSdk;

use BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio;

class Validador {

    private static array $estados = [
        'RO', 'AC', 'AM', 'RR', 'PA',
        'AP', 'TO', 'MA', 'PI', 'CE',
        'RN', 'PB', 'PE', 'AL', 'SE',
        'BA', 'MG', 'ES', 'RJ', 'SP',
        'PR', 'SC', 'RS', 'MS', 'MT',
        'GO', 'DF', 'EX'
    ];

    private static function onlyNumbers(string $value): string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }

    private static function isCpf(string $cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

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

    private static function isCnpj(string $cnpj): bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
        
        if (strlen($cnpj) != 14 || preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        
        $resto = $soma % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;
        
        if ($cnpj[12] != $digito1) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        
        $resto = $soma % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;
        
        return $cnpj[13] == $digito2;
    }

    private static function isEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}