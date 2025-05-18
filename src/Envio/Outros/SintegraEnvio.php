<?php

namespace BrasilNFeSdk\Envio\Outros;

/**
 * Class SintegraEnvio
 */
class SintegraEnvio
{
    /**
     * @var SintegraDFe[]
     */
    public array $dFes = [];

    /**
     * @var SintegraInventario[]
     */
    public array $inventario = [];

    /**
     * Código do regime tributável (Padrão - 1)
     * 1 - Simples Nacional
     * 2 - Simples Nacional, excesso sublimite de receita bruta
     * 3 - Regime Normal
     */
    public int $crt = 1;

    /**
     * Código de identificação da estrutura do arquivo magnético entregue (Padrão - 3)
     * 1 - Estrutura conforme Convênio ICMS 57/95, na versão estabelecida pelo Convênio ICMS 31/99
     * 2 - Estrutura conforme Convênio ICMS 57/95, na versão estabelecida pelo Convênio ICMS 69/02
     * 3 - Estrutura conforme Convênio ICMS 57/95, com as alterações promovidas pelo Convênio ICMS 76/03
     */
    public int $codIdConvenio = 3;

    /**
     * Código da identificação da natureza das operações informadas (Padrão - 3)
     * 1 - Interestaduais somente operações sujeitas ao regime de Substituição Tributária
     * 2 - Interestaduais - operações com ou sem Substituição Tributária
     * 3 - Totalidade das operações do informante
     */
    public int $codIdNaturezaOperacao = 3;

    /**
     * Finalidade da apresentação do arquivo magnético (Padrão - 1)
     * 1 - Normal
     * 2 - Retificação total de arquivo
     * 3 - Retificação aditiva de arquivo
     * 5 - Desfazimento
     */
    public int $codFinalidade = 1;

    public \DateTime $dtInicio;
    public \DateTime $dtFim;
    public bool $incluirNotasSaidas = true;

    public function __construct()
    {
        $this->dFes = [];
        $this->inventario = [];
    }
}

/**
 * Class SintegraDFe
 */
class SintegraDFe
{
    /**
     * @var SintegraProdutoDFe[]
     */
    public array $produtos = [];

    /**
     * Informações do xml (Obrigatório)
     */
    public string $base64Xml;

    /**
     * Emissão própia? (Obrigatório)
     */
    public bool $emissaoPropia = true;

    /**
     * Modelo do documento fiscal informado (Padrão 55) (Obrigatório)
     * 55 - NF-e Nota Fiscal Eletrônica
     * 57 - CT-e Conhecimento de Transporte Eletrônico
     * 65 - NFC-e Nota Fiscal do Consumidor Eletrônica
     */
    public int $modeloDocumento = 55;

    /**
     * Situação da nota fiscal
     * 0 - Documento Fiscal Cancelado
     * 1 - Documento Fiscal Normal
     * 2 - Documento com USO DENEGADO (NFe e CTe)
     * 3 - Documento com USO inutilizado (NFe e CTe)
     * 4 - Lançamento Extemporâneo de Documento Fiscal Normal
     * 5 - Lançamento Extemporâneo de Documento Fiscal Cancelado
     */
    public int $situacao = 1;

    /**
     * Descrição do arquivo (Opcional)
     */
    public ?string $descricao = null;

    /**
     * Data de entrada/saída
     */
    public \DateTime $dtEntradaSaida;

    public function __construct()
    {
        $this->produtos = [];
    }
}

/**
 * Class SintegraProdutoDFe
 */
class SintegraProdutoDFe
{
    /**
     * Número do item na nota fiscal
     */
    public int $numeroItem;

    /**
     * Código do produto
     */
    public string $codProduto;

    /**
     * CFOP
     */
    public int $cfop;

    /**
     * ICMS
     */
    public string $icms;

    /**
     * Nome do produto
     */
    public string $nomeProduto;
}

/**
 * Class SintegraInventario
 */
class SintegraInventario
{
    public \DateTime $dtInventario;
    public string $codProduto;
    public float $quantidade = 0.0;
    public float $valor = 0.0;

    /**
     * Tabela de código de posse das mercadorias inventariadas (Padrão - 1)
     * 1 - Mercadorias de propriedade do Informante e em seu poder
     * 2 - Mercadorias de propriedade do Informante em poder de terceiros
     * 3 - Mercadorias de propriedade de terceiros em poder do Informante
     */
    public int $codPosseMercadoria = 1;

    public string $cnpjPossuidor = '';
    public string $iePossuidor = '';
    public ?string $ufPossuidor = null;
    public string $nmProduto;
    public string $ncm;
    public string $unidadeMedida;
    public float $aliquotaIPI = 0.0;
    public float $aliquotaICMS = 0.0;
    public float $redBCICMS = 0.0;
    public float $bcICMSST = 0.0;
}