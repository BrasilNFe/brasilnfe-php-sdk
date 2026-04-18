<?php

namespace BrasilNFeSdk\Envio\Outros;

class NFEnerComEnvio
{
    /**
     * Modelo do Documento
     *
     * 6 - Energia elétrica
     * 21 - Comunicação
     * 22 - Telecomunicação
     */
    public int $modeloDocumento;

    /**
     * Tipo de ambiente
     *
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente;

    /**
     * Código de controle interno unico da venda. Evita duplicidades, caso configurado.
     */
    public string $identificadorInterno;

    /**
     * Série da nota fiscal. Quando não informado é controlado pelo Painel
     */
    public string $serie;

    /**
     * Número da nota fiscal. Quando não informado é controlado pelo Painel
     */
    public ?int $numero;

    /**
     * Situação do documento (Padrão 4)
     * 1 - documento fiscal cancelado dentro do mesmo período de apuração;
     * 2 - documento fiscal emitido em substituição a um documento fiscal cancelado dentro do mesmo período de apuração
     * 3 - documento fiscal complementar
     * 4 - demais casos
     */
    public int $situacao = 4;

    /**
     * Valor total da fatura comercial
     */
    public float $valorTotalFatura;

    /**
     * Data de emissão do documento
     */
    public \DateTime $dataEmissao;

    /**
     * Informações referente a nota de comunicação e Telecomunicação
     */
    public ?Comunicao $comunicao;

    /**
     * Informações referente a nota de Energia
     */
    public ?Energia $energia;

    /**
     * Informações do Destinatário
     */
    public ?Destinatario $destinatario;

    /**
     * Produtos para gerar os registros do arquivo
     * @var EnerComProduto[]
     */
    public array $produtos;

    public function __construct()
    {
        $this->produtos = [];
    }
}
