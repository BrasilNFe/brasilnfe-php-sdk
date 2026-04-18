<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

class NotaFiscalRetorno extends Erros
{
    public function __construct()
    {
        $this->returnNF = new RetornoInfo();
    }

    /**
     * @var RetornoInfo
     */
    public RetornoInfo $returnNF;

    /** @var string|null */
    public ?string $base64Xml = null;

    /** @var string|null */
    public ?string $base64File = null;
}

class RetornoInfo
{
    public function __construct()
    {
        $this->detalhes = new DetalhesNF();
    }

    /** @var int|null */
    public ?int $numero = null;

    /** @var string|null */
    public ?string $chaveNf = null;

    /** @var int|null */
    public ?int $codTipoAmbiente = null;

    /** @var string|null */
    public ?string $dsTipoAmbiente = null;

    /** @var int|null */
    public ?int $codStatusRespostaSefaz = null;

    /** @var string|null */
    public ?string $dsStatusRespostaSefaz = null;

    /** @var bool|null */
    public ?bool $ok = false;

    /** @var DetalhesNF|null */
    public ?DetalhesNF $detalhes = null;
}

/**
 * Class DetalhesNF
 */
class DetalhesNF
{
    /** @var float */
    public float $valorNf;

    /** @var float */
    public float $valorIcms;

    /** @var float */
    public float $valorIpi;

    /** @var float */
    public float $valorPis;

    /** @var float */
    public float $valorCofins;
}

// NotaFiscalLoteListRetorno e NotaFiscalLoteRetorno movidos para
// NotaFiscalLoteRetorno.php (PSR-4).
