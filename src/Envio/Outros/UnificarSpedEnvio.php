<?php

namespace BrasilNFeSdk\Envio\Outros;

/**
 * Class UnificarSpedEnvio
 */
class UnificarSpedEnvio
{
    /**
     * Lista de códigos dos SPEDs para unificação
     * @var string[]
     */
    public array $codigos = [];

    /**
     * Lista de SPEDs em formato Base64 para unificação
     * @var string[]
     */
    public array $base64Speds = [];

    public function __construct()
    {
        $this->codigos = [];
        $this->base64Speds = [];
    }
}