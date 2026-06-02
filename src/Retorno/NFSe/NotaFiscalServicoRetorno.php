<?php

namespace BrasilNFeSdk\Retorno\NFSe;

use DateTime;
use BrasilNFeSdk\Retorno\Erros;

/**
 * Class NotaFiscalServicoRetorno
 */
class NotaFiscalServicoRetorno extends Erros
{
    public function __construct()
    {
        $this->notas = [];
    }

    /**
     * Data de recebimento do lote
     * @var string|null
     */
    public ?string $dataRecebimento = null;

    /**
     * Número do lote enviado
     * @var int
     */
    public int $lote;

    /**
     * Código atrelado ao lote
     * - Usado para busca de lotes
     * @var string|null
     */
    public ?string $codLote = null;

    /**
     * Número de protocolo do lote
     * @var string|null
     */
    public ?string $protocolo = null;

    /**
     * Código do ambiente de envio
     * @var int
     */
    public int $codTipoAmbiente;

    /**
     * Descrição do ambiente de envio
     * @var string|null
     */
    public ?string $dsTipoAmbiente = null;

    /**
     * Municipio onde foi enviado
     * @var string|null
     */
    public ?string $municipioEnvio = null;

    /**
     * 1 - Lote processado
     * 2 - Aguardando processamento
     * 3 - Ocorreu um erro ao processar o lote
     * 4 - Ocorreu um erro ao analisar as informações do lote
     * @var int
     */
    public int $statusLote;

    /** @var list<NotaFiscalServicoRetornoInfo> */
    public array $notas;

    /**
     * Dados xml do lote, bytes em base64
     * @var string|null
     */
    public ?string $base64XmlLote = null;

    /**
     * Tempo total da transmissão para prefeitura em milisegundos
     * @var int
     */
    public int $tempoRequisicaoPrefeitura;
}

/**
 * Class NotaFiscalServicoRetornoInfo
 */
class NotaFiscalServicoRetornoInfo
{
    public function __construct()
    {
        $this->valores = new Valores();
    }

    /**
     * Valores da NFS-e
     * @var Valores
     */
    public Valores $valores;

    /**
     * Informa se a NFS-e encontra-se cancelada
     * @var bool
     */
    public bool $cancelada;

    /**
     * Número do RPS
     * @var int
     */
    public int $numeroRps;

    /**
     * Data da emissao da NFSe
     * @var DateTime
     */
    public DateTime $dtEmissao;

    /**
     * Cpf ou Cnpj do Prestador
     * @var string|null
     */
    public ?string $cpfCnpjPrestador = null;

    /**
     * Cpf ou Cnpj do Tomador
     * @var string|null
     */
    public ?string $cpfCnpjTomador = null;

    /**
     * Número da NFS-e
     * @var string|null
     */
    public ?string $numeroNfse = null;

    /**
     * Chave de acesso da NFS-e (quando disponível, depende do município).
     * @var string|null
     */
    public ?string $chave = null;

    /**
     * Código de verificação da NFS-e
     * @var string|null
     */
    public ?string $codVerificacao = null;

    /**
     * Identificador interno da nfs (enviado pela API)
     * @var string|null
     */
    public ?string $identificadorInterno = null;

    /**
     * 1 - NFSe Emitida
     * 3 - Erro ao emitir
     * @var int
     */
    public int $status;

    /**
     * Descrição do erro caso a nota não for emitida
     * @var string|null
     */
    public ?string $erro = null;

    /**
     * Dados xml da nfs, bytes em base64
     * @var string|null
     */
    public ?string $base64Xml = null;

    /**
     * Documento pdf da nfs, bytes em base64
     * @var string|null
     */
    public ?string $base64Doc = null;
}

/**
 * Class Valores
 */
class Valores
{
    /**
     * Base de cálculo
     * @var float
     */
    public float $baseCalculo;

    /**
     * Valor Líquido
     * @var float
     */
    public float $valorLiquido;

    /**
     * Valor ISS
     * @var float
     */
    public float $valorIss;

    /**
     * Valor ISS Retido
     * @var float
     */
    public float $valorIssRetido;

    /**
     * Valor PIS
     * @var float
     */
    public float $valorPis;

    /**
     * Valor COFINS
     * @var float
     */
    public float $valorCofins;

    /**
     * Valor CSLL
     * @var float
     */
    public float $valorCsll;

    /**
     * Valor IR
     * @var float
     */
    public float $valorIr;

    /**
     * Alíquota em %
     * @var float
     */
    public float $aliquota;
}
