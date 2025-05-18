<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class BuscarNotaFiscalEnvio
 */
class BuscarNotaFiscalEnvio
{
    /**
     * Tipo do documento fiscal (Padrão 0 - Entrada)
     * 0 - Entradas
     * 1 - Saídas
     */
    public int $tipoDocumentoFiscal;

    /**
     * Data inicial da busca
     */
    public \DateTime $dtInicio;

    /**
     * Data final da busca
     */
    public \DateTime $dtFim;

    /**
     * Busca notas que possui o código interno informado (somente saídas)
     */
    public ?string $indentificadorInterno = null;
}