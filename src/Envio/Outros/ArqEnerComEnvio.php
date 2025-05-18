<?php

namespace BrasilNFeSdk\Envio\Outros;

use BrasilNFeSdk\Retorno\NewError;

class ArqEnerComEnvio
{
    /**
     * Tipo de geração de arquivo
     * 
     * 1 - Gera o arquivo a partir das notas enviadas no período informado.
     * 2 - Gera o arquivo a partir da lista de notas.
     */
    public int $tipoGeracao;

    /**
     * Mês de emissão da notas
     */
    public ?int $mes;

    /**
     * Ano de emissão da notas
     */
    public ?int $ano;

    /**
     * Tipo de ambiente
     * 
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente;

    /**
     * Notas Fiscais de Energia, Comunicação e Telecomunicações
     * @var NFEnerComEnvio[]
     */
    public array $notas;

    public function __construct()
    {
        $this->notas = [];
    }
}

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

class Comunicao
{
    /**
     * Tipo de Utilização
     * 1 - Telefonia
     * 2 - Comunicação de dados
     * 3 - TV por assinatura
     * 4 - Provimento de acesso à internet
     * 5 - Multimídia
     * 6 - Outros
     */
    public ?int $tipoUtilizacao;

    /**
     * Tipo de Assinate
     * 1 - Comercial/Industrial
     * 2 - Poder público
     * 3 - Residencial/Pessoa física
     * 4 - Público
     * 5 - Semi-público
     * 6 - Outros
     */
    public ?int $tipoAssinante;
}

class Energia
{
    /**
     * Código Classe de Consumo
     * 1 - Comercial
     * 2 - Consumo próprio
     * 3 - Iluminação pública
     * 4 - Industrial
     * 5 - Poder público
     * 6 - Residencial
     * 7 - Rural
     * 8 - Serviço Público
     */
    public ?int $classeConsumo;

    /**
     * Código da subclasse de consumo de energia elétrica.
     * 
     * 1 - Residencial
     * 2 - Residencial baixa renda
     * 3 - Residencial baixa renda indígena
     * 4 - Residencial baixa renda quilombola
     * 5 - Residencial baixa renda benefício de prestação continuada da assistência social
     * 6 - Residencial baixa renda multifamiliar
     * 7 - Comercial
     * 8 - Serviços de transporte, exceto tração elétrica
     * 9 - Serviços de comunicação e telecomunicação
     * 10 - Associação e entidades filantrópicas
     * 11 - Templos religiosos
     * 12 - Administração condominial: iluminação e instalações de uso comum de prédio ou conjunto de edificações
     * 13 - Iluminação em rodovias: solicitada por quem detenha concessão ou autorização para administração em rodovias
     * 14 - Semáforos, radares e câmeras de monitoramento de trânsito, solicitados por quem detenha concessão ou autorização para controle de trânsito
     * 15 - Outros serviços e outras atividades da classe comercial
     * 16 - Agropecuária rural
     * 17 - Agropecuária urbana
     * 18 - Residencial rural
     * 19 - Cooperativa de eletrificação rural
     * 20 - Agroindustrial
     * 21 - Serviço público de irrigação rural
     * 22 - Escola agrotécnica
     * 23 - Aquicultura
     * 24 - Poder público Federal
     * 25 - Poder Público Estadual ou Distrital
     * 26 - Poder público Municipal
     * 27 - Tração Elétrica
     * 28 - Água esgoto ou saneamento
     * 99 - Outros
     */
    public ?int $subClasseConsumo;

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
    public ?int $grupoTensao;
    
    public ?float $tarifaAplicada;
    
    public ?\DateTime $dataLeituraAnterior;
    
    public ?\DateTime $dataLeituraAtual;
}

class Destinatario extends NewPessoa
{
    /**
     * Código interno que identifica o destinatário
     */
    public string $codigo;

    /**
     * CFP ou CNPJ
     */
    public string $cpfCnpj;

    /**
     * Inscrição Estadual
     */
    public string $ie;

    /**
     * Razão Social
     */
    public string $razaoSocial;
}

class EnerComProduto
{
    /**
     * Código interno que identifica item
     */
    public string $codigo;

    /**
     * Descrição do item
     */
    public string $descricao;

    /**
     * Código de classificação do serviço
     */
    public string $codClassificacao;
    
    /**
     * Código CFOP
     */
    public int $cfop;

    /**
     * Unidade de Medida
     */
    public string $unidadeMedida;

    /**
     * Quantidade de itens
     */
    public float $quantidade;

    /**
     * Valor unitário do item
     */
    public float $valor;
    
    /**
     * Desconto total aplicado no item
     */
    public ?float $desconto;

    /**
     * Acréscimos e Despesas Acessórias
     */
    public ?float $outrasDespesas;
    
    /**
     * Alíquota de Icms
     */
    public float $aliqIcms;
    
    /**
     * Alíquota de PIS
     */
    public float $aliqPis;
    
    /**
     * Alíquota de Cofins
     */
    public float $aliqCofins;

    /**
     * Código do grupo tributário cadastrado no Painel, para automação de impostos
     */
    public string $codTributacao;
}

class ArqEnerComRetorno extends NewError
{
    /**
     * Status de geração do arquivo
     */
    public bool $status;

    /**
     * Base64 contendo o arquivo em zip
     */
    public string $base64Zip;
}

class NFEnerComRetorno extends NewError
{
    /**
     * Status do Lançamento
     */
    public bool $status;
}