<?php

namespace BrasilNFeSdk\Envio\NFe;

use BrasilNFeSdk\Envio\Outros\Pessoa;

/**
 * Class NotaFiscalServicoEnvio
 */
class NotaFiscalServicoEnvio
{
    /**
     * @var NFSInfo[]
     */
    public array $nFSInfo = [];

    public int $tipoAmbiente;
    public ?int $lote = null;

    public function __construct()
    {
        $this->nFSInfo = [];
    }
}

/**
 * Class NFSInfo
 */
class NFSInfo
{
    public bool $enviarEmail = false;
    public ?string $serieRps = null;
    public ?int $numeroRps = null;
    public ?string $identificadorInterno = null;
    
    /**
     * Data da competência
     * Caso não informado será a data de emissão
     */
    public ?\DateTime $dataCompetencia = null;
    
    public ?\DateTime $dataEmissao = null;
    public Tomador $tomador;
    public ?IntermediarioServico $intermediario = null;
    public ?ConstrucaoCivil $construcaoCivil = null;
    public Servico $servico;

    public function __construct()
    {
        $this->tomador = new Tomador();
        $this->servico = new Servico();
    }
}

/**
 * Class Valores
 */
class Valores
{
    public float $valorServico = 0.0;
    public float $valorInss = 0.0;
    public float $aliquota = 0.0;
    public float $descontoCondicionado = 0.0;
    public float $descontoIncondicionado = 0.0;
    public float $outrasRetencoes = 0.0;
    public float $valorDeducoes = 0.0;
    public float $totalTributos = 0.0;
    public ?float $aliquotaIr = null;
}

/**
 * Class ConfiguracaoImposto
 */
class ConfiguracaoImposto
{
    /**
     * Indide 0,65% de PIS caso o valor for maior que R$215,05
     */
    public bool $incidePis = false;

    /**
     * Indide 3,00% de COFINS caso o valor for maior que R$215,05
     */
    public bool $incideCofins = false;

    /**
     * Indide 1,00% de CSLL caso o valor for maior que R$215,05
     */
    public bool $incideCsll = false;

    /**
     * Indide 1,50% (ou a alíquota informada em (Valores -> AliquotaIr)) de IR caso o valor for maior que R$666,66
     */
    public bool $incideIr = false;

    /**
     * Indide 0,65% de PIS independente do valor
     */
    public bool $forcarIncidenciaPis = false;

    /**
     * Indide 3,00% de COFINS independente do valor
     */
    public bool $forcarIncidenciaCofins = false;

    /**
     * Indide 1,00% de CSLL independente do valor
     */
    public bool $forcarIncidenciaCsll = false;

    /**
     * Indide 1,50% (ou a alíquota informada em (Valores -> AliquotaIr)) de IR independente do valor
     */
    public bool $forcarIncidenciaIr = false;
}

/**
 * Class Servico
 */
class Servico
{
    public ?string $descricao = null;
    public ?string $itemListaServico = null;

    /**
     * 0 - Sem Regime Especial
     * 1 - Microempresa municipal
     * 2 - Estimativa
     * 3 - Sociedade de profissionais
     * 4 - Cooperativa
     * 5 - MEI - Simples Nacional
     * 6 - ME EPP - Simples Nacional
     */
    public int $regimeEspecialTributacao = 0;

    /**
     * Natureza da Operação
     * 1 - Tributação no município
     * 2 - Tributação fora do município
     * 3 - Isenção
     * 4 - Imune
     * 5 - Exigibilidade suspensa por decisão judicial
     * 6 - Exigibilidade suspensa por procedimento administrativo
     * 7 - Não tributada (Governador Valadares)
     */
    public int $naturezaOperacao = 1;

    /**
     * Incentio Cultural?
     */
    public bool $incentivadorCultural = false;

    /**
     * Incentivo Fiscal?
     */
    public bool $incentivoFiscal = false;

    /**
     * Iss Retido?
     */
    public bool $issRetido = false;
    
    /**
     * Código de tributação do município
     */
    public ?string $codTributacaoMunicipio = null;

    /**
     * Exigibilidade ISS (Padrão 1)
     * 1 - Exigível
     * 2 - Não incidência
     * 3 - Isenção
     * 4 - Exportação
     * 5 - Imunidade
     * 6 - Exigibilidade Suspensa por Decisão Judicia
     * 7 - Exigibilidade Suspensa por Processo Administrativo
     */
    public int $exigibilidadeISS = 1;

    /**
     * Código do municipio da incedência do serviço (Padrão - Município do Prestador)
     */
    public ?string $codMunicipioIncidencia = null;
    
    /**
     * Código do municipio da prestação do serviço (Padrão - Município do Prestador)
     */
    public ?string $codMunicipioPrestacao = null;

    public Valores $valores;
    public ConfiguracaoImposto $configuracaoImposto;

    public function __construct()
    {
        $this->valores = new Valores();
        $this->configuracaoImposto = new ConfiguracaoImposto();
    }
}

/**
 * Class IntermediarioServico
 */
class IntermediarioServico
{
    public ?string $rzSocial = null;
    public ?string $cpfCnpj = null;
    public ?string $inscricaoMunicipal = null;
}

/**
 * Class ConstrucaoCivil
 */
class ConstrucaoCivil
{
    public ?string $codObra = null;
    public ?string $art = null;
}

/**
 * Class Tomador
 */
class Tomador extends Pessoa
{
    public ?string $cpfCnpj = null;
    public ?string $nmTomador = null;
    public ?string $im = null;
}