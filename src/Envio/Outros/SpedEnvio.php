<?php

namespace BrasilNFeSdk\Envio\Outros;

/**
 * Class SpedEnvio
 */
class SpedEnvio
{
    /**
     * Tipo do arquivo EFD (Padrão - 1)
     * 1 - SPED EFD FISCAL ICMS/IPI
     * 2 - SPED EFD CONTRIBUIÇÕES PIS/COFINS
     */
    public int $tipoArquivo = 1;

    /**
     * Código do regime tributável (Padrão - 3)
     * 1 - Simples Nacional
     * 2 - Simples Nacional, excesso sublimite de receita bruta
     * 3 - Regime Normal
     */
    public int $crt = 3;

    /**
     * Ambiente de emissão das notas de saída (Padrão - 1)
     * 1 - Ambiente de Produção
     * 2 - Ambiente de Homologação
     */
    public int $ambienteNotasSaidas = 1;

    public bool $incluirNotasSaidas = true;
    public \DateTime $dtInicio;
    public \DateTime $dtFim;
    public EfdIcmsIpiInfo $efdIcmsIpiInfo;
    public EfdPisCofinsInfo $efdPisCofinsInfo;
    public Contador $contador;
    
    /** @var SpedDFe[] */
    public array $dFes = [];
    
    /** @var SpedAjusteImposto[] */
    public array $ajusteImpostos = [];

    /**
     * Incluido até 12/2022
     * @var SpedInutilizada[]
     */
    public array $inutilizadas = [];

    public function __construct()
    {
        $this->efdIcmsIpiInfo = new EfdIcmsIpiInfo();
        $this->efdPisCofinsInfo = new EfdPisCofinsInfo();
        $this->dFes = [];
        $this->inutilizadas = [];
        $this->ajusteImpostos = [];
        $this->contador = new Contador();
    }
}

class EfdIcmsIpiInfo
{
    /**
     * Código da finalidade do arquivo (Padrão - 0)
     * 0 - Remessa do arquivo original
     * 1 - Remessa do arquivo substituto
     */
    public int $codFinalidade = 0;

    /**
     * Perfil de apresentação do arquivo fiscal (Padrão - 0)
     * 0 - Perfil A
     * 1 - Perfil B
     * 2 - Perfil C
     */
    public int $indicadorPerfil = 0;

    /**
     * Indicador do tipo de atividade (Padrão - 10)
     * 0 - Industrial - Transformação
     * 1 - Industrial - Beneficiamento
     * 2 - Industrial - Montagem
     * 3 - Industrial - Acondicionamento ou Reacondicionamento
     * 4 - Industrial - Renovação ou Recondicionamento
     * 5 - Equiparado a industrial - Por opção
     * 6 - Equiparado a industrial - Importação Direta
     * 7 - Equiparado a industrial - Por lei específica
     * 8 - Equiparado a industrial - Não enquadrado nos códigos 05, 06 ou 07
     * 9 - Industrial ou equiparado - Outros
     * 10 - Outros
     */
    public int $indicadorAtividade = 10;

    /**
     * Indicador de Leituante Bloco K (Padrão - 0)
     * 0 - Leiaute simplificado
     * 1 - Leiaute completo
     * 2 - Leiaute restrito aos saldos de estoque
     */
    public int $indicadorLeituante = 0;

    /**
     * Valor total do saldo credor do período anterior
     */
    public float $valorSldCredorAnterior = 0.0;

    /**
     * Alimenta o bloco 1.
     */
    public InformacoesFisco $informacoesFisco;

    /**
     * Alimenta o bloco H, destina-se a informar o inventário físico do estabelecimento.
     * @var SpedInventario[]
     */
    public array $spedInventario = [];

    /**
     * Alimenta o bloco K, destina-se a prestar informações mensais da produção e respectivo consumo de insumos, bem como do estoque escriturado;
     * @var SpedEscrituracao[]
     */
    public array $spedEscrituracao = [];

    /**
     * Operaçãoes com instrumentos de pagamentos eletrônicos (REG 1600/1601)
     * @var SpedOperacaoCartao[]
     */
    public array $spedOperacaoCartao = [];

    /**
     * Ajustes / benefícios / incentivos da Apuração do ICMS
     * @var AjusteApuracaoIcmsIpi[]
     */
    public array $ajustesApuracao = [];

    public function __construct()
    {
        $this->informacoesFisco = new InformacoesFisco();
        $this->spedInventario = [];
        $this->spedEscrituracao = [];
        $this->spedOperacaoCartao = [];
        $this->ajustesApuracao = [];
    }
}

class EfdPisCofinsInfo
{
    /**
     * Tipo de Escrituração (Padrão - 0)
     * 0 - Original
     * 1 - Retificadora
     */
    public int $tipoEscrituracao = 0;

    /**
     * Indicador de tipo de atividade preponderante (Padrão - 9)
     * 0 - Industrial ou equiparado a industrial
     * 1 - Prestador de serviços
     * 2 - Atividade de comércio
     * 3 - Pessoas jurídicas referidas nos §§ 6º, 8º e 9º do art. 3º da Lei nº 9.718, de 1998
     * 4 - Atividade imobiliária
     * 9 - Outros
     */
    public int $indicadorTipoAtividadePreponderante = 9;

    /**
     * Indicador da natureza da pessoa jurídica (Padrão - NULL)
     * 0 - Pessoa jurídica em geral (não participante de SCP como sócia ostensiva)
     * 1 - Sociedade cooperativa (não participante de SCP como sócia ostensiva)
     * 2 - Entidade sujeita ao PIS/Pasep exclusivamente com base na Folha de Salários
     * 3 - Pessoa jurídica em geral participante de SCP como sócia ostensiva
     * 4 - Sociedade cooperativa participante de SCP como sócia ostensiva
     * 5 - Sociedade em Conta de Participação - SCP
     */
    public ?int $indicadorNaturezaPessoaJuridica = null;

    /**
     * Indicador de situação especial (Padrão - NULL)
     * 0 - Abertura
     * 1 - Cisão
     * 2 - Fusão
     * 3 - Incorporação
     * 4 - Encerramento
     */
    public ?int $indicadorSituacaoEspecial = null;

    /**
     * Código indicador da incidência tributária no período (Padrão - 2)
     * 1 - Escrituração de operações com incidência exclusivamente no regime não-cumulativo (Lucro Real)
     * 2 - Escrituração de operações com incidência exclusivamente no regime cumulativo (Lucro Presumido)
     * 3 - Escrituração de operações com incidência nos regimes não-cumulativo e cumulativo
     */
    public int $indicadorIncidenciaTributaria = 2;

    /**
     * Código indicador do Tipo de Contribuição Apurada no Período (Padrão - NULL)
     * 1 - Apuração da Contribuição Exclusivamente a Alíquota Básica
     * 2 - Apuração da Contribuição a Alíquotas Específicas (Diferenciadas e/ou por Unidade de Medida de Produto)
     */
    public ?int $indicadorTipoContribuicaoApurada = null;

    /**
     * Código indicador de método de apropriação de créditos comuns, no caso de incidência no regime não-cumulativo (IndicadorIncidenciaTributaria = 1 ou 3) (Padrão - NULL)
     * 1 - Método de Apropriação Direta
     * 2 - Método de Rateio Proporcional (Receita Bruta)
     */
    public ?int $indicadorMetodoApropriacaoCredito = null;

    /**
     * Código indicador do critério de escrituração e apuração adotado, no caso de incidência exclusivamente no regime cumulativo (IndicadorIncidenciaTributaria = 2),
     * pela pessoa jurídica submetida ao regime de tributação com base no lucro presumido (Padrão - NULL)
     * 1 - Regime de Caixa – Escrituração consolidada (Registro F500)
     * 2 - Regime de Competência - Escrituração consolidada (Registro F550)
     * 9 - Regime de Competência - Escrituração detalhada, com base nos registros dos Blocos "A", "C", "D" e "F".
     */
    public ?int $indicadorCriterioEscrituracao = null;

    /**
     * Número do Recibo da Escrituração anterior a ser retificada, (TipoEscrituracao = 1)
     */
    public ?string $numReciboEscrituracaoAnterior = null;

    /**
     * Ajustes do Crédito de PIS/Pasep e ajustes do Crédito de Cofins Apurado (M110 e M510)
     * @var AjusteApuracaoPisCofins[]
     */
    public array $ajustesApuracao = [];

    public function __construct()
    {
        $this->ajustesApuracao = [];
    }
}

class SpedEscrituracao
{
    public \DateTime $dtInicio;
    public \DateTime $dtFim;
    
    /** @var Escrituracao[] */
    public array $escrituracao = [];
    
    /** @var EscrituracaoCorrecao[] */
    public array $escrituracaoCorrecao = [];
    
    /** @var Producao[] */
    public array $producao = [];
    
    /** @var MovimentacaoInterna[] */
    public array $movimentacaoInterna = [];

    public function __construct()
    {
        $this->escrituracao = [];
        $this->escrituracaoCorrecao = [];
        $this->producao = [];
        $this->movimentacaoInterna = [];
    }
}

class Escrituracao
{
    /**
     * Indicador de propriedade/posse do item:
     * 0 - Item de propriedade do informante e em seu poder
     * 1 - Item de propriedade do informante em posse de terceiros
     * 2 - Item de propriedade de terceiros em posse do informante
     */
    public int $indicadorPropiedade = 0;

    public float $quantidade = 0.0;
    public \DateTime $dtEstoqueFinal;
    public SpedProdutoInfo $produto;
    public Participante $participante;

    public function __construct()
    {
        $this->produto = new SpedProdutoInfo();
        $this->participante = new Participante();
    }
}

class EscrituracaoCorrecao
{
    /**
     * Indicador de propriedade/posse do item:
     * 0 - Item de propriedade do informante e em seu poder
     * 1 - Item de propriedade do informante em posse de terceiros
     * 2 - Item de propriedade de terceiros em posse do informante
     */
    public int $indicadorPropiedade = 0;

    public int $quantidadeCorrecaoNegativa = 0;
    public int $quantidadeCorrecaoPositiva = 0;
    public SpedProdutoInfo $produto;
    public Participante $participante;

    public function __construct()
    {
        $this->produto = new SpedProdutoInfo();
        $this->participante = new Participante();
    }
}

class Producao
{
    public ?\DateTime $dtInicio = null;
    public ?\DateTime $dtFim = null;
    public ?string $codOrdemProducao = null;
    public float $quantidade = 0.0;
    public SpedProdutoInfo $produto;
    
    /** @var Insumo[] */
    public array $insumos = [];

    public function __construct()
    {
        $this->produto = new SpedProdutoInfo();
        $this->insumos = [];
    }
}

class Insumo
{
    /**
     * Data de saída do estoque para alocação ao produto.
     */
    public \DateTime $dtSaida;

    /**
     * Quantidade consumida do item.
     */
    public float $quantidade = 0.0;
    public SpedProdutoInfo $insumoInfo;

    public function __construct()
    {
        $this->insumoInfo = new SpedProdutoInfo();
    }
}

class MovimentacaoInterna
{
    /**
     * Data da movimentação interna.
     */
    public \DateTime $dtMovimentacao;

    /**
     * Quantidade movimentada do item de origem.
     */
    public float $quantidadeOrigem = 0.0;

    /**
     * Quantidade movimentada do item de destino.
     */
    public float $quantidadeDestino = 0.0;
    public SpedProdutoInfo $produtoOrigem;
    public SpedProdutoInfo $produtoDestino;

    public function __construct()
    {
        $this->produtoOrigem = new SpedProdutoInfo();
        $this->produtoDestino = new SpedProdutoInfo();
    }
}

class SpedProdutoInfo
{
    /**
     * Código do produto
     */
    public ?string $codProduto = null;

    /**
     * Unidade de medida
     */
    public ?string $unidadeMedida = null;

    /**
     * Nome do produto
     */
    public ?string $nomeProduto = null;

    /**
     * Tipo do item - Atividades Industriais, Comerciais e Serviços (Padrão 00 - Mercadoria para Revenda):
     * 00 - Mercadoria para Revenda
     * 01 - Matéria-Prima
     * 02 - Embalagem
     * 03 - Produto em Processo
     * 04 - Produto Acabado
     * 05 - Subproduto
     * 06 - Produto Intermediário
     * 07 - Material de Uso e Consumo
     * 08 - Ativo Imobilizado
     * 09 - Serviços
     * 10 - Outros insumos
     * 99 - Outras
     */
    public string $tipoItem = "00";

    /**
     * Código do gênero do item. Consulte a tabela AQUI
     */
    public ?string $codGeneroItem = null;

    /**
     * Código do serviço. Consulte a tabela AQUI
     */
    public ?string $codServico = null;

    public ?string $ncm = null;
    public ?string $cest = null;
}

class SpedInventario
{
    /**
     * Motivo do Inventário (Padrão 1 - No final no período):
     * 1 - No final no período
     * 2 - Na mudança de forma de tributação da mercadoria (ICMS)
     * 3 - Na solicitação da baixa cadastral, paralisação temporária e outras situações
     * 4 - Na alteração de regime de pagamento – condição do contribuinte
     * 5 - Por determinação dos fiscos
     */
    public int $motivoInventario = 1;

    public \DateTime $dtInventario;
    
    /** @var Inventario[] */
    public array $inventarios = [];

    public function __construct()
    {
        $this->inventarios = [];
    }
}

class Inventario
{
    /**
     * Indicador de propriedade/posse do item:
     * 0 - Item de propriedade do informante e em seu poder
     * 1 - Item de propriedade do informante em posse de terceiros
     * 2 - Item de propriedade de terceiros em posse do informante
     */
    public int $indicadorPropiedade = 0;

    public float $quantidade = 0.0;
    public float $valorUnitario = 0.0;
    public float $valorImpostoRenda = 0.0;
    public ?string $descricaoComplementar = null;
    public SpedProdutoInfo $produto;
    public Participante $participante;

    /**
     * Código da conta analítica contábil debitada/creditada
     */
    public ?string $codCta = null;
    
    /** @var InformacaoComplementar[] */
    public array $informacaoComplementar = [];

    public function __construct()
    {
        $this->produto = new SpedProdutoInfo();
        $this->participante = new Participante();
        $this->informacaoComplementar = [];
    }
}

class SpedProdutoDFe extends SpedProdutoInfo
{
    /**
     * Número do item na nota fiscal
     */
    public int $numeroItem = 0;

    public int $cfop = 0;
    public ?string $icms = null;
    public float $aliqIcms = 0.0;

    /**
     * CST PIS (Padrão 50 - Emissão de Terceiros):
     * 50 - Mercadoria para Revenda
     */
    public ?string $cstPIS = null;

    /**
     * CST COFINS (Padrão 50 - Emissão de Terceiros):
     * 50 - Mercadoria para Revenda
     */
    public ?string $cstCOFINS = null;
    public ?PlanoContaContabil $planoContaContabil = null;
}

class AjusteFiscal
{
    /**
     * Informação da SubApuração. (Obrigatório quando o terceiro número do CodigoAjuste estiver entre 3 e 8) (1900)
     */
    public ?SubApuracao $subApuracao = null;
    
    /**
     * Código do ajustes/benefício/incentivo. (Obrigatório) (C197)
     */
    public ?string $codigoAjuste = null;

    /**
     * Descrição complementar do ajuste do documento fiscal. (C197)
     */
    public ?string $descricaoComplementarAjuste = null;

    /**
     * Descrição da observação vinculada ao lançamento fiscal. (Obrigatório) (0460)
     */
    public ?string $descricaoObservacao = null;

    /**
     * Descrição complementar do código de observação. (C195)
     */
    public ?string $descricaoComplementar = null;

    /**
     * Número do item na nota fiscal
     */
    public ?int $numeroItem = null;

    /**
     * Busca todos os itens que tem o cfop e aplica o ajuste nos mesmos
     */
    public ?int $cfop = null;

    /**
     * Busca todos os itens que tem o cst e aplica o ajuste nos mesmos
     */
    public ?string $cstIcms = null;

    /**
     * Busca todos os itens que tem a aliquota e aplica o ajuste nos mesmos
     */
    public ?float $aliqIcms = null;

    /**
     * Outros valores. (C197)
     */
    public float $vlOutros = 0.0;
}

class AjusteApuracaoIcmsIpi
{
    public ?string $codigoAjuste = null;
    public ?string $descricaoComplementar = null;
    public float $valor = 0.0;
    
    /**
     * Informação do registro E113
     * @var AjusteApuracaoDocumentos[]
     */
    public array $documentos = [];

    public function __construct()
    {
        $this->documentos = [];
    }
}

class AjusteApuracaoDocumentos
{
    /**
     * Modelo do documento fiscal informado (Padrão 55) (Obrigatório).
     * 6 - Nota Fiscal de Energia Elétrica
     * 21 - Nota Fiscal de Serviço de Comunicação
     * 22 - Nota Fiscal de Serviço de Telecomunicação
     * 28 - Nota Fiscal de Consumo/Fornecimento de Gás
     * 29 - Conta de Fornecimento D'água Canalizada
     * 55 - Nota Fiscal Eletrônica (NF-e)
     * 57 - Conhecimento de Transporte Eletrônico (CT-e)
     * 65 - Nota Fiscal do Consumidor Eletrônica (NFC-e)
     * 66 - Nota Fiscal de Energia Elétrica Eletrônica
     * 67 - Conhecimento de Transporte Eletrônico para outros serviços (CT-e OS)
     */
    public int $modeloDocumento = 55;

    public ?string $serie = null;
    public ?string $subSerie = null;
    public int $numero = 0;
    public ?string $chave = null;
    public \DateTime $dtEmissao;
    public float $valor = 0.0;
    public ?SpedProdutoInfo $produto = null;
    public ?Participante $participante = null;
}

class AjusteApuracaoPisCofins
{
    /**
     * Indicador do tipo de ajuste:
     * 0 - PIS/Pasep
     * 1 - COFINS
     */
    public int $tipo = 0;
    
    /**
     * Indicador do tipo de ajuste:
     * 0 - Ajuste de redução
     * 1 - Ajuste de acréscimo
     */
    public int $indicador = 0;

    /**
     * Código do ajuste, conforme a Tabela indicada no item 4.3.8.
     */
    public ?string $codigoAjuste = null;

    /**
     * Descrição resumida do ajuste.
     */
    public ?string $descricaoComplementar = null;

    /**
     * Número do processo, documento ou ato concessório ao qual o ajuste está vinculado, se houver.
     */
    public ?string $numeroDocumento = null;

    /**
     * Data de referência do ajuste
     */
    public ?\DateTime $dataReferenciaAjuste = null;

    /**
     * Valor do ajuste.
     */
    public float $valor = 0.0;
}

class SubApuracao
{
    /**
     * Descrição complementar das obrigações a recolher. (REG - 1900)
     */
    public ?string $descricaoComplementarSubApuracao = null;
    
    /**
     * Descrição complementar das obrigações a recolher. (REG - 1921)
     */
    public ?string $descricaoComplementarAjusteSubApuracao = null;

    /**
     * Código de ajuste da SUB-APUARÇÃO e dedução (REG - 1921)
     */
    public ?string $codigoAjusteSubApuracao = null;

    /**
     * Código da obrigação a recolher (REG - 1926)
     */
    public ?string $codigoObrigacao = null;

    /**
     * Código de receita referente à obrigação, próprio da unidade da federação, conforme legislação estadual. (REG - 1926)
     */
    public ?string $codigoReceitaObrigacao = null;

    /**
     * Descrição complementar das obrigações a recolher. (REG - 1926)
     */
    public ?string $descricaoComplementarObrigacao = null;
}

class DocArrecadacao
{
    /**
     * Código do modelo do documento de arrecadação:
     * 0 - documento estadual de arrecadação
     * 1 - GNRE
     */
    public int $tipoDocumento = 0;

    /**
     * Unidade federada beneficiária do recolhimento
     */
    public ?string $uf = null;

    /**
     * Código completo da autenticação bancária
     */
    public ?string $codigoAutBancaria = null;

    /**
     * Número do documento de arrecadação
     */
    public ?string $numero = null;

    /**
     * Valor do total do documento de arrecadação (principal, atualização monetária, juros e multa)
     */
    public float $valor = 0.0;

    /**
     * Data de vencimento do documento de arrecadação
     */
    public \DateTime $dtVencimento;

    /**
     * Data de pagamento do documento de arrecadação ou data do vencimento, no caso de ICMS antecipado a recolher.
     */
    public \DateTime $dtPagamento;
}

class InformacaoComplementar
{
    public float $bcIcms = 0.0;
    public ?string $cstIcms = null;
    public float $valorIcms = 0.0;
}

class PlanoContaContabil
{
    public ?string $descricaoPlano = null;
    public ?string $codigoPlano = null;

    /**
     * Código da natureza da conta/grupo de contas (Padrão 1):
     * 1 - Contas de ativo
     * 2 - Contas de passivo
     * 3 - Patrimônio líquido
     * 4 - Contas de resultado
     * 5 - Contas de compensação
     * 9 - Outras
     */
    public int $codigoNatureza = 1;

    /**
     * Indicador do tipo de conta:
     * 0 - Analítica (conta)
     * 1 - Sintética (grupo de contas)
     */
    public int $tipoConta = 0;

    public int $nivel = 0;
    public ?string $codigoContaCorrelacionadaRFB = null;
    public \DateTime $dtInclusao_Alteracao;
}

class Contador extends Pessoa
{
    /**
     * Nome do contabilista.
     */
    public ?string $nome = null;

    /**
     * Número de inscrição do contabilista no Conselho Regional de Contabilidade.
     */
    public ?string $crc = null;

    /**
     * CPF do contabilista.
     */
    public ?string $cpf = null;
    
    /**
     * Número de inscrição do escritório de contabilidade no CNPJ, se houver.
     */
    public ?string $cnpj = null;
}

class InformacoesFisco
{
    /**
     * Existem informações acerca de créditos de ICMS a serem controlados, definidos pela Sefaz: S - Sim; N -Não
     */
    public bool $indCreditoIcmsControlado = false;

    /**
     * Ocorreu averbação (conclusão) de exportação no período: S - Sim; N - Não
     */
    public bool $indExportacaoPer = false;

    /**
     * A empresa prestou serviços de transporte aéreo de cargas e de passageiros: S - Sim; N - Não
     */
    public bool $indTranspAereo = false;

    /**
     * É comercio varejista de combustíveis com movimentação e/ou estoque no período: S - Sim; N - Não
     */
    public bool $indVarejistaCombustivel = false;

    /**
     * Usinas de açúcar e/álcool – O estabelecimento é produtor de açúcar e/ou álcool carburante com movimentação e/ou estoque no período: S - Sim; N - Não
     */
    public bool $indUnsina = false;

    /**
     * Sendo o registro obrigatório em sua Unidade de Federação, existem informações a serem prestadas neste registro: S - Sim; N - Não
     */
    public bool $indInfoPrestadas = false;

    /**
     * A empresa é distribuidora de energia e ocorreu fornecimento de energia elétrica para consumidores de outra UF: S - Sim; N - Não
     */
    public bool $indDistribuidoraEnergia = false;

    /**
     * Realizou vendas com Cartão de Crédito ou de débito: S - Sim; N - Não
     */
    public bool $indVendasCartao = false;

    /**
     * Reg. 1700 – Foram emitidos documentos fiscais em papel no período em unidade da federação que exija o controle de utilização de documentos fiscais: S - Sim; N - Não
     */
    public bool $indDocumentosFiscaisPapel = false;

    /**
     * Possui informações GIAF1? : S - Sim; N - Não
     */
    public bool $indGiaf1 = false;

    /**
     * Possui informações GIAF3? : S - Sim; N - Não
     */
    public bool $indGiaf3 = false;

    /**
     * Possui informações GIAF4? : S - Sim; N - Não
     */
    public bool $indGiaf4 = false;

    /**
     * Possui informações consolidadas de saldos de restituição, ressarcimento e complementação do ICMS?
     */
    public bool $indRestRessarcComplIcms = false;
}

class SpedDFe
{
    /**
     * Modo de informação do documento (Padrão 1) (Obrigatório).
     * 1 - Informar contúdo do xml
     * 2 - Informar conteúdo das propriedades contidas nos documentos
     * 3 - Substituir ou adicionar informaçoes ao documento emitido internamente (buscar Notas internas = verdadeiro)
     */
    public int $modoInfoDFe = 1;

    /**
     * Chave da DF-e que terá informações adicionadas ou substituidas (Obrigatório quando a propriedade TipoDFe = 3).
     */
    public ?string $chaveDFe = null;

    /**
     * Modelo do documento fiscal informado (Padrão 55) (Obrigatório).
     * 6 - Nota Fiscal de Energia Elétrica
     * 10 - Nota Fiscal de Serviço (NFS-e)
     * 21 - Nota Fiscal de Serviço de Comunicação
     * 22 - Nota Fiscal de Serviço de Telecomunicação
     * 28 - Nota Fiscal de Consumo/Fornecimento de Gás
     * 29 - Conta de Fornecimento D'água Canalizada
     * 55 - Nota Fiscal Eletrônica (NF-e)
     * 57 - Conhecimento de Transporte Eletrônico (CT-e)
     * 65 - Nota Fiscal do Consumidor Eletrônica (NFC-e)
     * 66 - Nota Fiscal de Energia Elétrica Eletrônica
     * 67 - Conhecimento de Transporte Eletrônico para outros serviços (CT-e OS)
     */
    public int $modeloDocumento = 55;

    /**
     * Informações do xml (Obrigatório).
     */
    public ?string $base64Xml = null;

    /**
     * Emissão própia? (Obrigatório).
     */
    public bool $emissaoPropia = true;

    /**
     * Situação da nota fiscal (Obrigatório).
     * 0 - Documento regular
     * 1 - Escrituração extemporânea de documento regular
     * 2 - Documento cancelado
     * 3 - Escrituração extemporânea de documento cancelado
     * 4 - NF-e, NFC-e ou CT-e - denegado até 12/2022
     * 6 - Documento Fiscal Complementar
     * 7 - Escrituração extemporânea de documento complementar
     * 8 - Documento Fiscal emitido com base em Regime Especial ou Norma Específica
     */
    public int $situacao = 0;

    /**
     * Descrição do arquivo (Opcional).
     */
    public ?string $descricao = null;

    /**
     * Data de entrada/saída
     */
    public \DateTime $dtEntradaSaida;

    /**
     * Produtos
     * @var SpedProdutoDFe[]
     */
    public array $produtos = [];

    /**
     * Ajustes Fiscais
     * @var AjusteFiscal[]
     */
    public array $ajustesFiscais = [];

    /**
     * Ajustes Fiscais
     * @var DocArrecadacao[]
     */
    public array $docArrecadacoes = [];

    /**
     * Informações do documento fiscal
     */
    public DFeInfo $dFeInfo;

    public function __construct()
    {
        $this->ajustesFiscais = [];
        $this->produtos = [];
        $this->docArrecadacoes = [];
        $this->dFeInfo = new DFeInfo();
    }
}

class DFeComplemento
{
    public int $cfop = 0;

    /**
     * CST Icms Transporte:
     * 00
     * 20
     * 40
     * 41
     * 51
     * 60
     * 90
     */
    public ?string $cstIcms = null;
    
    public ?string $cstPis = null;
    
    public ?string $cstCofins = null;

    /**
     * Indicador do tipo do frete:
     * 0 - Por conta de terceiros
     * 1 - Por conta do emitente
     * 2 - Por conta do destinatário
     * 9 - Sem cobrança de frete
     */
    public ?int $indicadorFrete = null;

    /**
     * Alíquota de ICMS (Apenas para entrada de C500 - Contas)
     */
    public ?float $aliqIcms = null;
    
    /**
     * Base de calculo do ICMS (Apenas para entrada de C500 - Contas)
     */
    public ?float $bcIcms = null;
    
    public ?PlanoContaContabil $planoContaContabil = null;
}

class SpedInutilizada
{
    public int $serie = 0;
    public int $numero = 0;

    /**
     * Modelo do documento fiscal informado (Obrigatório).
     * 55 - NF-e Nota Fiscal Eletrônica
     * 57 - CT-e Conhecimento de Transporte Eletrônico
     * 65 - NFC-e Nota Fiscal do Consumidor Eletrônica
     */
    public int $modeloDocumento = 0;        
}

class SpedAjusteImposto
{
    /**
     * Tipo do Ajuste (Obrigatório).
     * 1 - ICMS
     * 2 - PIS
     * 3 - COFINS
     */
    public int $tipo;

    public string $filterNCM;
    
    public ?int $filterCFOP;

    public string $cst;        
    
    public ?float $aliquota;        
}

class SpedOperacaoCartao
{
    /**
     * Identificação da instituição que efetuou o pagamento
     */
    public Participante $participante;

    /**
     * Identificação do intermediador da transação
     */
    public ?Participante $intermediador;

    /**
     * Valor total bruto das vendas e/ou prestações de serviços no campo de incidência do ICMS, incluindo operações com imunidade do imposto
     */
    public float $totalVendas;

    /**
     * Valor total bruto das prestações de serviços no campo de incidência do ISS
     */
    public float $totalIss;

    /**
     * Valor total de operações deduzido dos valores dos campos TotalVendas e TotalIss.
     */
    public float $totalOutros;        
    
    public function __construct()
    {
        $this->participante = new Participante();
    }
}

class DFeInfo
{
    public string $chave;
    
    public string $serie;

    /**
     * Código de classe de consumo de energia elétrica ou gás
     * 
     * 1 - Comercial
     * 2 - Consumo Próprio
     * 3 - Iluminação Pública
     * 4 - Industrial
     * 5 - Poder Público
     * 6 - Residencial
     * 7 - Rural
     * 8 - Serviço Público
     * Código de classe de consumo de fornecimento d'água
     * 0 - registro consolidando os documentos de consumo residencial até R$ 50,00
     * 1 - registro consolidando os documentos de consumo residencial de R$ 50,01 a R$ 100,00
     * 2 - registro consolidando os documentos de consumo residencial de R$ 100,01 a R$ 200,00
     * 3 - registro consolidando os documentos de consumo residencial de R$ 200,01 a R$ 300,00
     * 4 - registro consolidando os documentos de consumo residencial de R$ 300,01 a R$ 400,00
     * 5 - registro consolidando os documentos de consumo residencial de R$ 400,01 a R$ 500,00
     * 6 - registro consolidando os documentos de consumo residencial de R$ 500,01 a R$ 1000,00
     * 7 - registro consolidando os documentos de consumo residencial acima de R$ 1.000,01
     * 20 - registro consolidando os documentos de consumo comercial/industrial até R$ 50,00
     * 21 - registro consolidando os documentos de consumo comercial/industrial de R$ 50,01 a R$ 100,00
     * 22 - registro consolidando os documentos de consumo comercial/industrial de R$ 100,01 a R$ 200,00
     * 23 - registro consolidando os documentos de consumo comercial/industrial de R$ 200,01 a R$ 300,00
     * 24 - registro consolidando os documentos de consumo comercial/industrial de R$ 300,01 a R$ 400,00
     * 25 - registro consolidando os documentos de consumo comercial/industrial de R$ 400,01 a R$ 500,00
     * 26 - registro consolidando os documentos de consumo comercial/industrial de R$ 500,01 a R$ 1.000,00
     * 27 - registro por documento fiscal de consumo comercial/industrial acima de R$ 1.000,01
     * 80 - registro consolidando os documentos de consumo de órgão público
     * 90 - registro consolidando os documentos de outros tipos de consumo até R$ 50,00
     * 91 - registro consolidando os documentos de outros tipos de consumo de R$ 50,01 a R$ 100,00
     * 92 - registro consolidando os documentos de outros tipos de consumo de R$ 100,01 a R$ 200,00
     * 93 - registro consolidando os documentos de outros tipos de consumo de R$ 200,01 a R$ 300,00
     * 94 - registro consolidando os documentos de outros tipos de consumo de R$ 300,01 a R$ 400,00
     * 95 - registro consolidando os documentos de outros tipos de consumo de R$ 400,01 a R$ 500,00
     * 96 - registro consolidando os documentos de outros tipos de consumo de R$ 500,01 a R$ 1.000,00
     * 97 - registro consolidando os documentos de outros tipos de consumo acima de R$ 1.000,01
     * 99 - registro por documento fiscal emitido
     */
    public ?int $codConsumo;
    
    public int $numero;
    
    public \DateTime $dtEmissao;

    public string $observacao;

    public float $valor;
    
    public float $desconto;

    /**
     * Código do grupo de tensão
     * 
     * 1 - A1 - Alta tensão (230kV ou mais)
     * 2 - A2 - Alta tensão (88 a 138kV)
     * 3 - A3 - Alta tensão (69kV)
     * 4 - A3a - Alta tensão (30kV a 44kV)
     * 5 - A4 - Alta tensão (2,3kV a 25kV)
     * 6 - AS - Alta tensão subterrâneo
     * 7 - B1 - Residencial
     * 8 - B1 - Residencial baixa renda
     * 9 - B2 - Rural
     * 10 - B2 - Cooperativa de eletrificação rural
     * 11 - B2 - Serviço público de irrigação
     * 12 - B3 - Demais classes
     * 13 - B4a - Iluminação pública - rede de distribuição
     * 14 - B4b - Iluminação pública - bulbo de lâmpada
     */
    public ?int $codGrupoTensao;

    /**
     * Código do tipo de ligação
     * 
     * 1 - Monofásico
     * 2 - Bifásico
     * 3 - Trifásico
     */
    public ?int $tipoLigacao;

    /**
     * Código do Tipo de Assinante:
     * 1 - Comercial/Industrial
     * 2 - Poder Público
     * 3 - Residencial/Pessoa física
     * 4 - Público
     * 5 - Semi-Público
     * 6 - Outros
     */
    public ?int $tipoAssinante;

    public ?DFeComplemento $dFeComplemento;

    public Participante $participante;
    
    public function __construct()
    {
        $this->participante = new Participante();
    }
}

class Participante extends Pessoa
{
    public string $cpfCnpj;
    
    public string $ie;

    public string $nmParticipante;

    public ?int $indicadorIe;
}