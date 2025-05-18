<?php

namespace BrasilNFeSdk\Envio\NFe;

class PegarArquivoEventoEnvio
{
    /**
     * Chave da NF-e
     */
    public ?string $chaveNF = null;

    /**
     * Número do protocolo
     */
    public ?string $nuProtocolo = null;

    /**
     * Tipo do arquivo
     */
    public int $tipoArquivo = 0;
}