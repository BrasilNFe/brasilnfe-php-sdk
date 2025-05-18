<?php

namespace BrasilNFeSdk\Envio\CTe;

/**
 * Class CancelarCTeEnvio
 */
class CancelarCTeEnvio
{
    /**
     * Chave do CTe a ser cancelado
     */
    public ?string $chaveNF = null;

    /**
     * Justificativa para o cancelamento
     */
    public ?string $justificativa = null;
}