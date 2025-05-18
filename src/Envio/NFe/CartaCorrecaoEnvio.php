<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class CartaCorrecaoEnvio
 */
class CartaCorrecaoEnvio
{
    /**
     * Ambiente de emissão do evento (Padrão 1)
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente = 1;

    /**
     * Chave da NF-e
     */
    public ?string $chaveNF = null;

    /**
     * Descrição da correção da NF-e
     */
    public ?string $correcao = null;

    /**
     * Número sequencial do evento
     */
    public ?int $numeroSequencial = null;
}