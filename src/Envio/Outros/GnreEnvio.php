<?php

namespace BrasilNFeSdk\Envio\Outros;

/**
 * Class GnreEnvio
 */
class GnreEnvio
{
    /**
     * Tipo de ambiente (1-Produção, 2-Homologação)
     */
    public int $tipoAmbiente;

    /**
     * Lista de guias GNRE
     * @var GnreGuia[]
     */
    public array $gnreGuia = [];

    public function __construct()
    {
        $this->gnreGuia = [];
    }
}

/**
 * Class GnreGuia
 */
class GnreGuia
{
    /**
     * Informações do favorecido
     */
    public Favorecido $favorecido;

    /**
     * Chave do Documento Fiscal Eletrônico
     */
    public ?string $chaveDfe = null;

    /**
     * Valor da guia
     */
    public float $valor = 0.0;

    /**
     * Data de pagamento
     */
    public \DateTime $dataPagamento;

    /**
     * Data de vencimento
     */
    public \DateTime $dataVencimento;

    public function __construct()
    {
        $this->favorecido = new Favorecido();
    }
}

/**
 * Class Favorecido
 */
class Favorecido
{
    /**
     * CPF ou CNPJ do favorecido
     */
    public ?string $cpfCnpj = null;

    /**
     * Nome do favorecido
     */
    public ?string $nmFavorecido = null;

    /**
     * Código do município (IBGE)
     */
    public ?string $codMunicipio = null;

    /**
     * UF (sigla)
     */
    public ?string $uf = null;
}