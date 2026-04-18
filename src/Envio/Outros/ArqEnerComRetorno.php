<?php

namespace BrasilNFeSdk\Envio\Outros;

use BrasilNFeSdk\Retorno\NewError;

class ArqEnerComRetorno extends NewError
{
    /**
     * Status de geração do arquivo
     */
    public bool $status;

    /**
     * Base64 contendo o arquivo em zip
     */
    public string $base64Zip;
}
