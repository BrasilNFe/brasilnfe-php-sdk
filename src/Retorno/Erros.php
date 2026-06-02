<?php

namespace BrasilNFeSdk\Retorno;

/**
 * Class Erros
 */
class Erros
{
    public function __construct()
    {
        $this->avisos = [];
    }

    public ?string $error = "";

    public ?array $avisos = [];
}