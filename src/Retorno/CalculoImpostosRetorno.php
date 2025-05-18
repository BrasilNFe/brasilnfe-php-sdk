<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class CalculoImpostosRetorno
 */
class CalculoImpostosRetorno extends Erros
{
    /** @var Impostos */
    public Impostos $impostos;
    
    /** @var Total */
    public Total $total;
}

/**
 * Class Impostos
 */
class Impostos
{
    /** @var float */
    public float $baseCalculoIcms;

    /** @var float */
    public float $baseCalculoIcmsSt;

    /** @var float */
    public float $valorIcms;

    /** @var float */
    public float $valorIcmsSt;

    /** @var float */
    public float $valorIcmsDesoneracao;

    /** @var float */
    public float $valorIpi;

    /** @var float */
    public float $valorPis;

    /** @var float */
    public float $valorCofins;

    /** @var float */
    public float $valorFcp;

    /** @var float */
    public float $valorFcpSt;

    /** @var float */
    public float $valorFcpStRetido;

    /** @var float */
    public float $valorImportacao;
}

/**
 * Class Total
 */
class Total
{
    /** @var float */
    public float $valorFrete;

    /** @var float */
    public float $valorDesconto;
    
    /** @var float */
    public float $valorSeguro;
    
    /** @var float */
    public float $valorDespesasAcessorias;
    
    /** @var float */
    public float $valorTributosAproximados;
    
    /** @var float */
    public float $valorProdutos;
    
    /** @var float */
    public float $valorTotal;
}