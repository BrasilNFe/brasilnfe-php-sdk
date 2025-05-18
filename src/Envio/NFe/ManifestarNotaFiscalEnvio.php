<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class ManifestarNotaFiscalEnvio
 */
class ManifestarNotaFiscalEnvio
{
    /**
     * Chave da NF-e
     */
    public ?string $chave = null;

    /**
     * Ambiente de emissão da NF-e (Padrão 1)
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente = 1;

    /**
     * Tipo da manifestação
     * 1 - Confirmação da Operação
     * 2 - Ciência da Operação
     * 3 - Desconhecimento da Operação
     * 4 - Operação não Realizada
     */
    public int $tipoManifestacao;

    /**
     * Número sequencial do evento
     */
    public ?int $numeroSequencial = null;
}