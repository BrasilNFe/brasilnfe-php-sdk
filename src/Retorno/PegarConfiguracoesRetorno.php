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
    
    /** @var string|null */
    public ?string $nmEstado = null;

    /** @var string|null */
    public ?string $tipoEmpresa = null;

    /** @var string|null */
    public ?string $nmEmpresa = null;

    /** @var string|null */
    public ?string $nmFantazia = null;

    /** @var string|null */
    public ?string $codIdCsc = null;

    /** @var string|null */
    public ?string $csc = null;

    /** @var string|null */
    public ?string $cnpj = null;

    /** @var string|null */
    public ?string $cnae = null;

    /** @var string|null */
    public ?string $ie = null;

    /** @var string|null */
    public ?string $iest = null;

    /** @var string|null */
    public ?string $im = null;

    /** @var string|null */
    public ?string $cep = null;

    /** @var int */
    public int $codMunicipio;

    /** @var string|null */
    public ?string $numero = null;

    /** @var string|null */
    public ?string $nmBairro = null;

    /** @var string|null */
    public ?string $complemento = null;

    /** @var string|null */
    public ?string $logradouro = null;

    /** @var string|null */
    public ?string $nmMunicipio = null;

    /** @var string|null */
    public ?string $site = null;
    
    /** @var bool */
    public bool $apenasSat;
    
    /** @var int */
    public int $modeloSat;
    
    /** @var string|null */
    public ?string $nuAtivacao = null;
    
    /** @var string|null */
    public ?string $nuSat = null;
}