<?php

namespace BrasilNFeSdk\Envio\NFe;

class PegarArquivoEnvio
{
    /**
     * @var string[]|null
     */
    public ?array $chaves = [];

    /**
     * Chave da NF-e
     * @var string|null
     */
    public ?string $chaveNF = null;

    /**
     * Tipo do documento fiscal (Padrão 1 - XML)
     * 1 - XML
     * 2 - DANFE/CUPOM
     */
    public int $fileType = 1;

    /**
     * Tipo do documento fiscal (Padrão 1 - Saída)
     * 0 - Entrada
     * 1 - Saída
     */
    public int $tipoDocumentoFiscal = 1;

    /**
     * Logo em base64 para ser usado no DANFE
     * @var string|null
     */
    public ?string $base64Logo = null;

    public function __construct()
    {
        $this->chaves = [];
    }
}