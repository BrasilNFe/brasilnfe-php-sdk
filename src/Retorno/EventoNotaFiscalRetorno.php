<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

class EventoNotaFiscalRetorno extends Erros
{
    /** @var string|null */
    public ?string $dsMotivo = null;

    /** @var string|null */
    public ?string $dsEvento = null;

    /** @var string|null */
    public ?string $dsAmbiente = null;

    /** @var string|null */
    public ?string $nuProtocolo = null;
    
    /** @var int|null */
    public ?int $numeroSequencial = null;

    /** @var int|null */
    public ?int $codStatusRespostaSefaz = null;

    /**
     * 1 - Evento Processado
     * 2 - Aguardando processamento do evento
     * 3 - Ocorreu um erro ao processar o evento
     * @var int|null
     */
    public ?int $status = null;
}