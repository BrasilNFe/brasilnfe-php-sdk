<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Payload de consulta de status de um lote de NF-e/NFC-e (/ConsultarLoteNFe).
 */
class ConsultarLoteNFeEnvio
{
    /** Código do lote retornado por /EnviarNotaFiscalLote. */
    public string $codLote;
}
