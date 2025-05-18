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
    /** @var string */
    public string $versao;

    /** @var int */
    public int $codTipoAmbiente;

    /** @var string */
    public string $dsTipoAmbiente;

    /** @var int */
    public int $codStatusRespostaSefaz;

    /** @var string */
    public string $dsStatusRespostaSefaz;

    /** @var int */
    public int $codEstadoEmitente;

    /** @var string */
    public string $dsEstadoEmitente;
}