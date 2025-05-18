<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

class EmpresaRetorno extends Erros
{
    /** @var string|null Token da empresa */
    public ?string $token = null;
    
    /** @var bool Status da empresa */
    public bool $status = false;
}