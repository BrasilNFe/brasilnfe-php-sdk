<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class StatusSefazEnvio
 */
class StatusSefazEnvio
{
    /**
     * Modelo do documento fiscal
     */
    public int $modeloDocumento;

    /**
     * Tipo de ambiente
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente;
}