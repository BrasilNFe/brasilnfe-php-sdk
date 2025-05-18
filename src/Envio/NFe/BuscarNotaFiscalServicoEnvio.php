<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class BuscarNotaFiscalServicoEnvio
 */
class BuscarNotaFiscalServicoEnvio
{
    /**
     * Código do lote
     */
    public ?string $codLote = null;

    /**
     * Rps para retornar (Se não enviar retorna todos)
     * @var long[]
     */
    public array $rps = [];

    public function __construct()
    {
        $this->rps = [];
    }
}