<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class ObterArquivosRangeRetorno
 */
class ObterArquivosRangeRetorno extends Erros
{
    /** @var int */
    public int $quantidade;

    /** @var string */
    public string $base64FilesCompacted;
}