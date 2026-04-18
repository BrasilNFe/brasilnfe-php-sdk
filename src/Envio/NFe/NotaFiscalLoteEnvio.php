<?php

namespace BrasilNFeSdk\Envio\NFe;

class NotaFiscalLoteEnvio
{
    public function __construct()
    {
        $this->nfInfos = [];
    }

    /**
     * @var int Identificação do Ambiente
     * @para 1 - Produção
     * @para 2 - Homologação
     */
    public $tipoAmbiente;

    /**
     * @var int Código do modelo do Documento Fiscal (Padrão 55)
     * @para 55 - NF-e
     * @para 65 - NFC-e
     */
    public $modeloDocumento = 55;

    /**
     * @var int|null Lote da Nota Fiscal
     */
    public $lote;

    /**
     * @var NFInfo[]
     */
    public $nfInfos;
}

class NFInfo
{
    public function __construct()
    {
        $this->produtos = [];
        $this->pagamentos = [];
        $this->transporte = new Transporte();
        $this->transporte->modalidadeFrete = 9;
    }

    /**
     * @var int|null Série da nota Fiscal
     */
    public $serie;

    /**
     * @var int|null Número da nota fiscal
     */
    public $numero;

    /**
     * @var \DateTime|null Data e Hora da saída ou de entrada da produto/serviço
     */
    public $dataEntradaSaida;

    /**
     * @var \DateTime|null Data e Hora da saída ou de entrada da produto/serviço (Envia a data atual caso não informada)
     */
    public $dataEmissao;

    /**
     * @var string B03 - Código numérico que compõe a Chave de Acesso. Número aleatório gerado pelo emitente para cada NF-e.
     */
    public $codigo;

    /**
     * @var string Utilizar quando o tipo de emissão for diferente normal
     */
    public $justificativa;

    /**
     * @var string[] Notas fiscal de Referência
     */
    public $nfReferencia;

    /**
     * @var int Indicador de presença do comprador no estabelecimento comercial no momento da operação
     */
    public $indicadorPresenca;

    /**
     * @var bool Indicador de intermediador/marketplace
     */
    public $indicadorIntermediador;

    /**
     * @var bool Indica operação com Consumidor final
     */
    public $consumidorFinal;

    /**
     * @var bool Forçar cálculo IBPT
     */
    public $calcularIBPT = true;

    /**
     * @var string Descrição da Natureza da Operação
     */
    public $naturezaOperacao;

    /**
     * @var int Finalidade da emissão da NF-e
     * @para 1 - NFe normal
     * @para 3 - NFe de ajuste
     * @para 4 - Devolução/Retorno
     */
    public $finalidade;

    public $observacao;
    public $observacaoFisco;
    public $identificadorInterno;
    public $enviarEmail;
    public Cliente $cliente;

    /**
     * @var Produto[]
     */
    public $produtos;

    /**
     * @var Pagamento[]
     */
    public $pagamentos;

    public Cobranca $cobranca;
    public Transporte $transporte;
    public Exporta $exporta;
    public Entrega $entrega;
}
