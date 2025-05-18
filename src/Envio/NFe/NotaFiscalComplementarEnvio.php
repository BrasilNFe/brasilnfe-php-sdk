<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class ImpostoComplementar
 */
class ImpostoComplementar
{
    /**
     * Código da Situação Tributária (CST)
     */
    public string $codSituacaoTributaria;

    /**
     * Alíquota ICMS
     */
    public float $aliquotaICMS = 0.0;

    /**
     * Alíquota ICMSST
     */
    public float $aliquotaICMSST = 0.0;

    /**
     * Base de cálculo do ICMS complementar
     */
    public float $baseCalculoICMS = 0.0;

    /**
     * Valor do complemento do ICMS
     */
    public float $valorICMS = 0.0;

    /**
     * Base de cálculo do ICMSST complementar
     */
    public float $baseCalculoICMSST = 0.0;

    /**
     * Valor do complemento do ICMSST
     */
    public float $valorICMSST = 0.0;

    /**
     * Base de cálculo do IPI
     */
    public float $baseCalculoIPI = 0.0;

    /**
     * Valor do complemento do IPI
     */
    public float $valorIPI = 0.0;
}

/**
 * Class NotaFiscalComplementarEnvio
 */
class NotaFiscalComplementarEnvio
{
    /**
     * Tipo de complemento
     * 0 - Complementar quantidade ou valor
     * 1 - Complementar impostos
     */
    public int $tipoComplemento = 1;

    /**
     * CFOP
     */
    public int $cfop;

    /**
     * Série da nota Fiscal
     */
    public ?int $serie = null;

    /**
     * Número da nota fiscal
     */
    public ?int $numero = null;

    /**
     * Lote da Nota Fiscal
     */
    public ?int $lote = null;

    /**
     * Código numérico que compõe a Chave de Acesso
     */
    public ?string $codigo = null;

    /**
     * Notas fiscal de Referência
     */
    public ?string $nfReferencia = null;

    /**
     * Descrição da Natureza da Operação
     */
    public ?string $naturezaOperacao = null;

    /**
     * Identificação do Ambiente
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente;

    public ?string $observacaoFisco = null;

    public ?string $observacao = null;

    public ?Cliente $cliente = null;
    
    public ?Transporte $transporte = null;

    public ?Cobranca $cobranca = null;

    public ?ImpostoComplementar $impostoComplementar = null;

    /**
     * @var Produto[]
     */
    public array $produtos = [];
}