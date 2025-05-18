<?php

namespace BrasilNFeSdk\Envio\CTe;

/**
 * Class CartaCorrecaoCTeEnvio
 */
class CartaCorrecaoCTeEnvio
{
    /** @var string */
    public string $chaveNF;
    
    /** @var list<CorrecaoCTe> */
    public array $correcoes;
}

/**
 * Class CorrecaoCTe
 */
class CorrecaoCTe
{
    /** @var string */
    public string $campo;
    
    /** @var string */
    public string $grupo;
    
    /** @var string */
    public string $valor;
}