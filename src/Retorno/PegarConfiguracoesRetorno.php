<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class PegarConfiguracoesRetorno
 */
class PegarConfiguracoesRetorno extends Erros
{
    /** @var int */
    public int $codEstado;
    
    /** @var string */
    public string $nmEstado;

    /** @var string */
    public string $tipoEmpresa;

    /** @var string */
    public string $nmEmpresa;

    /** @var string */
    public string $nmFantazia;

    /** @var string */
    public string $codIdCsc;

    /** @var string */
    public string $csc;

    /** @var string */
    public string $cnpj;

    /** @var string */
    public string $cnae;

    /** @var string */
    public string $ie;

    /** @var string */
    public string $iest;

    /** @var string */
    public string $im;

    /** @var string */
    public string $cep;

    /** @var int */
    public int $codMunicipio;

    /** @var string */
    public string $numero;

    /** @var string */
    public string $nmBairro;

    /** @var string */
    public string $complemento;

    /** @var string */
    public string $logradouro;

    /** @var string */
    public string $nmMunicipio;

    /** @var string */
    public string $site;
    
    /** @var bool */
    public bool $apenasSat;
    
    /** @var int */
    public int $modeloSat;
    
    /** @var string */
    public string $nuAtivacao;
    
    /** @var string */
    public string $nuSat;
}