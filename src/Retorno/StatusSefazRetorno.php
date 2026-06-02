<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class StatusSefazRetorno
 */
class StatusSefazRetorno extends Erros
{
    /** @var StatusSefaz */
    public StatusSefaz $statusSefaz;
}

/**
 * Class StatusSefaz
 */
class StatusSefaz
{
    /** @var string|null */
    public ?string $versao = null;

    /** @var int */
    public int $codTipoAmbiente;

    /** @var string|null */
    public ?string $dsTipoAmbiente = null;

    /** @var int */
    public int $codStatusRespostaSefaz;

    /** @var string|null */
    public ?string $dsStatusRespostaSefaz = null;

    /** @var int */
    public int $codEstadoEmitente;

    /** @var string|null */
    public ?string $dsEstadoEmitente = null;
}