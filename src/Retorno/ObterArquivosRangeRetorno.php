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

    /** @var string|null */
    public ?string $base64FilesCompacted = null;
}