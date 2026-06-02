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
    
    /** @var string|null */
    public ?string $codigo = null;

    /** @var string|null */
    public ?string $registros = null;
    
    /** @var string|null */
    public ?string $url = null;
    
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
    /** @var string|null */
    public ?string $codigoAjuste = null;
    
    /** @var string|null */
    public ?string $codigoProduto = null;
    
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

    /** @var string|null */
    public ?string $cpfCnpj = null;

    /** @var string|null */
    public ?string $chave = null;
    
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

    /** @var string|null */
    public ?string $codigoProduto = null;

    /** @var int */
    public int $cfop;
    
    /** @var string|null */
    public ?string $ncm = null;
    
    /** @var string|null */
    public ?string $cstIcmsCsosn = null;
    
    /** @var string|null */
    public ?string $cstPis = null;
    
    /** @var string|null */
    public ?string $cstCofins = null;
    
    /** @var string|null */
    public ?string $cstIpi = null;
    
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