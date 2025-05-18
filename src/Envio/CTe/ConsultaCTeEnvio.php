<?php

namespace BrasilNFeSdk\Envio\CTe;

/**
 * Class ConsultaCTeEnvio
 */
class ConsultaCTeEnvio
{
    /**
     * Tipo Consulta 0 - Protocolo | 1 - Recibo
     * @var int
     */
    public int $tipoConsulta;
    
    /**
     * Chave NFe
     * @var string
     */
    public string $chave;
    
    /**
     * Recibo NFe
     * @var string
     */
    public string $recibo;
}