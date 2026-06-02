<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class SintegraRetorno
 */
class SintegraRetorno extends Erros
{
    /** @var string|null */
    public ?string $codigo = null;
    
    /** @var bool */
    public bool $status;

    /** @var string|null */
    public ?string $registros = null;
    
    /** @var Detalhes */
    public Detalhes $detalhes;
}

/**
 * Class Detalhes
 */
class Detalhes
{
    /** @var float */
    public float $valorSaidasNfce;
    
    /** @var float */
    public float $valorSaidasNfe;
    
    /** @var float */
    public float $valorSaidasCte;

    /** @var float */
    public float $valorEntradasNfe;
    
    /** @var float */
    public float $valorEntradasCte;
    
    /** @var float */
    public float $valorInventario;
}