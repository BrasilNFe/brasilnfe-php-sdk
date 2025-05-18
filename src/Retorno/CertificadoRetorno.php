<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;
use DateTime;

class CertificadoRetorno extends Erros
{
    /** @var bool */
    public bool $expirado;

    /** @var DateTime */
    public DateTime $dtExpiracao;
    
    /** @var bool */
    public bool $status;
}