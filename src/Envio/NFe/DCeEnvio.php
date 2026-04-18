<?php

namespace BrasilNFeSdk\Envio\NFe;

use BrasilNFeSdk\Envio\Outros\Pessoa;

class PessoaDCe extends Pessoa
{
    public ?string $cpfCnpj = null;
    public ?string $nome = null;
}

class ItemDCe
{
    /** Descrição do produto/conteúdo (1-120 caracteres) */
    public ?string $descricao = null;

    /** Código NCM (2 ou 8 dígitos) */
    public ?string $nCM = null;

    public ?float $quantidade = null;
    public ?float $valorUnitario = null;
    public float $valorTotal = 0.0;

    /** Informações adicionais (até 500 caracteres) */
    public ?string $informacoesAdicionais = null;
}

class DCeEnvio
{
    public function __construct()
    {
        $this->itens = [];
    }

    public ?int $codigo = null;
    public ?int $lote = null;
    public ?int $serie = null;
    public ?int $numero = null;
    public ?string $identificadorInterno = null;

    /** 1 - Produção, 2 - Homologação */
    public int $tipoAmbiente = 2;

    /**
     * Tipo do emitente:
     * 0 - App Fisco, 1 - Marketplace, 2 - Emissor próprio,
     * 3 - Transportadora, 4 - ECT (Correios)
     */
    public int $tipoEmitente = 3;

    /** Obrigatório quando TipoEmitente=0 */
    public ?string $xOrgaoFisco = null;

    /** Obrigatório quando TipoEmitente=0 */
    public ?string $ufFisco = null;

    /**
     * Modalidade de transporte:
     * 0 - Correios, 1 - Conta própria, 2 - Transportadora
     */
    public int $modalidadeTransporte = 2;

    /** Obrigatório quando TipoEmitente=1 */
    public ?string $siteMarketplace = null;

    public ?PessoaDCe $remetente = null;
    public ?PessoaDCe $destinatario = null;

    /** @var ItemDCe[] */
    public array $itens = [];

    public ?float $valorTotal = null;
    public ?string $informacoesComplementares = null;
    public ?string $informacoesAdicionaisFisco = null;
    public ?string $declaracaoContribuinteICMS = null;
    public ?string $declaracaoCrimeTributario = null;
}
