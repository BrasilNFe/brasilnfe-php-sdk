<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;
use DateTime;

/**
 * Class SpedRetorno
 */
class SpedRetorno extends Erros
{
    public function __construct()
    {
        $this->detalhamento = new Detalhamento();
    }

    /** @var int */
    public int $status;
    
    /** @var string */
    public string $codigo;

    /** @var string */
    public string $registros;
    
    /** @var string */
    public string $url;
    
    /** @var Detalhamento */
    public Detalhamento $detalhamento;
}

/**
 * Class Detalhamento
 */
class Detalhamento
{
    public function __construct()
    {
        $this->dfes = [];
    }

    /** @var float */
    public float $saldoCredorTransportarIcmsIpi;

    /** @var list<DetalhamentoDFe> */
    public array $dfes;
}

/**
 * Class InfoAjuste
 */
class InfoAjuste
{
    /** @var string */
    public string $codigoAjuste;
    
    /** @var string */
    public string $codigoProduto;
    
    /** @var float */
    public float $icms;
    
    /** @var float */
    public float $bcIcms;

    /** @var float */
    public float $outros;
}

/**
 * Class DetalhamentoDFe
 */
class DetalhamentoDFe
{
    public function __construct()
    {
        $this->itens = [];
        $this->infoAjustes = [];
    }

    /** @var int */
    public int $tipoMovimentacao;

    /** @var string */
    public string $cpfCnpj;

    /** @var string */
    public string $chave;
    
    /** @var int|null */
    public ?int $cfopCte;

    /** @var DateTime */
    public DateTime $dataMovimentacao;

    /** @var list<DetalhamentoDFeItem> */
    public array $itens;

    /** @var list<InfoAjuste> */
    public array $infoAjustes;
}

/**
 * Class DetalhamentoDFeItem
 */
class DetalhamentoDFeItem
{
    /** @var int */
    public int $numeroItem;

    /** @var string */
    public string $codigoProduto;

    /** @var int */
    public int $cfop;
    
    /** @var string */
    public string $ncm;
    
    /** @var string */
    public string $cstIcmsCsosn;
    
    /** @var string */
    public string $cstPis;
    
    /** @var string */
    public string $cstCofins;
    
    /** @var string */
    public string $cstIpi;
    
    /** @var float */
    public float $quantidade;
    
    /** @var float */
    public float $valorUnitario;
    
    /** @var float */
    public float $valorTotal;
    
    /** @var float */
    public float $desconto;
    
    /** @var float */
    public float $outros;
    
    /** @var float */
    public float $frete;
    
    /** @var float */
    public float $icms;
    
    /** @var float */
    public float $aliquotaIcms;
    
    /** @var float */
    public float $pis;
    
    /** @var float */
    public float $cofins;
    
    /** @var float */
    public float $ipi;
}