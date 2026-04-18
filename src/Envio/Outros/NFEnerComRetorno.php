<?php

namespace BrasilNFeSdk\Envio\Outros;

use BrasilNFeSdk\Retorno\NewError;

class NFEnerComRetorno extends NewError
{
    /**
     * Status do Lançamento
     */
    public bool $status;
}
