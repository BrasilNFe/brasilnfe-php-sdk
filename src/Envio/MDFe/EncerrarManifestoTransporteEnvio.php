<?php

namespace BrasilNFeSdk\Envio\MDFe;

/**
 * Class EncerrarManifestoTransporteEnvio
 */
class EncerrarManifestoTransporteEnvio
{
    /**
     * Ambiente de emissão do evento (Padrão 1)
     * 1 - Produção
     * 2 - Homologação
     * @var int
     */
    public int $tipoAmbiente = 1;

    /**
     * Chave da MDF-e
     * @var string
     */
    public string $chave;

    /**
     * Descrição da correção da NF-e
     * @var string
     */
    public string $protocolo;

    /**
     * Número sequencial do evento
     * @var int|null
     */
    public ?int $numeroSequencial;
}