<?php

namespace BrasilNFeSdk\Envio\Outros;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class FciEnvio
 */
class FciEnvio
{
    /**
     * Produtos para gerar os registros do arquivo FCI
     * @var FciProduto[]
     */
    public array $produtos = [];

    /**
     * Quando verdadeiro retorna erro caso envie produtos com código repetido
     */
    public bool $validarCodigos = true;

    public function __construct()
    {
        $this->produtos = [];
    }
}

/**
 * Class FciProduto
 */
class FciProduto
{
    /**
     * Código interno que identifica a mercadoria no estabelecimento
     */
    public ?string $codigo = null;

    /**
     * Descrição da Mercadoria
     */
    public ?string $descricao = null;

    /**
     * Código baseado na tabela da Nomenclatura Comum do MERCOSUL
     */
    public ?string $ncm = null;

    /**
     * Código Global Trade Item Number, se houver
     */
    public ?string $gtin = null;

    /**
     * Unidade a que se refere o valor de saída da mercadoria
     */
    public ?string $unidadeMedida = null;

    /**
     * Valor de saída (comercialização) da mercadoria
     */
    public float $valorSaida = 0.0;

    /**
     * Valor da parcela importada do exterior (Obrigatório caso não for informado o Percentual Importado)
     */
    public ?float $valorImportado = null;

    /**
     * Percentual do conteúdo de importação informado pelo contribuinte (Obrigatório caso não for informado o Valor Importado)
     */
    public ?float $percentualImportado = null;
}

/**
 * Class FciRetorno
 */
class FciRetorno extends Erros
{
    /**
     * Status da operação
     */
    public bool $status = false;

    /**
     * Registros gerados
     */
    public ?string $registros = null;
}