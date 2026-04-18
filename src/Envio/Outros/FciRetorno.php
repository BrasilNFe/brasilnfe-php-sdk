<?php

namespace BrasilNFeSdk\Envio\Outros;

use BrasilNFeSdk\Retorno\Erros;

class FciRetorno extends Erros
{
    /**
     * Status do Lançamento
     */
    public bool $status;

    /**
     * Registros no formato do arquivo
     */
    public ?string $registros = null;
}
