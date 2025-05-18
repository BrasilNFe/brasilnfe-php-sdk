<?php

namespace BrasilNFeSdk\Envio\MDFe;

use DateTime;

/**
 * Class ManifestoTransporteEnvio
 */
class ManifestoTransporteEnvio
{
    public function __construct()
    {
        $this->carregamentos = [];
        $this->descarregamentos = [];
        $this->seguros = [];
        $this->percursoUfs = [];
    }

    /**
     * Tipo de ambiente (Padrão 2)
     * 1 - Produção
     * 2 - Homologação
     * @var int
     */
    public int $tipoAmbiente = 1;
    
    /** @var string */
    public string $identificadorInterno;
    
    /** @var int|null */
    public ?int $codigo;
    
    /** @var int|null */
    public ?int $lote;

    /** @var int|null */
    public ?int $numero;

    /** @var int|null */
    public ?int $serie;

    /**
     * Tipo de emitente (Padrão 2)
     * 1 - Prestador de Serviço de Transporte
     * 2 - Transportador de carga própria
     * @var int
     */
    public int $tipoEmitente = 2;

    /** @var DateTime|null */
    public ?DateTime $dataEmissao;
    
    /** @var string */
    public string $ufCarregamento;
    
    /** @var string */
    public string $ufDescarregamento;
    
    /** @var string */
    public string $observacao;

    /** @var string */
    public string $observacaoFisco;

    /**
     * Modalidade de Transporte (Padrão 1)
     * 1 - Rodoviário
     * 2 - Aéreo
     * 3 - Aquaviário
     * 4 - Ferroviário
     * @var int
     */
    public int $modalidade = 1;

    /**
     * Valor total da carga / mercadorias transportadas
     * @var float
     */
    public float $valor;

    /**
     * Peso Bruto Total da Carga / Mercadorias transportadas em KG
     * @var float
     */
    public float $peso;

    /** @var Rodoviario|null */
    public ?Rodoviario $rodoviario;
    
    /** @var Aerio|null */
    public ?Aerio $aerio;
    
    /** @var Aquaviario|null */
    public ?Aquaviario $aquaviario;
    
    /** @var Ferroviario|null */
    public ?Ferroviario $ferroviario;

    /** @var list<Seguro> */
    public array $seguros;

    /** @var list<Carregamento> */
    public array $carregamentos;
    
    /** @var list<Descarregamento> */
    public array $descarregamentos;
    
    /** @var list<string> */
    public array $percursoUfs;
}

/**
 * Class Aerio
 */
class Aerio
{
    /** @var string */
    public string $nacionalidade;
    
    /** @var string */
    public string $matricula;
    
    /** @var string */
    public string $numeroVoo;
    
    /** @var string */
    public string $arodromoEmbarque;
    
    /** @var string */
    public string $arodromoDestino;
    
    /** @var DateTime */
    public DateTime $dataVoo;
}

/**
 * Class Aquaviario
 */
class Aquaviario
{
    /** @var string */
    public string $cnpjAgencia;
    
    /** @var int */
    public int $tipoEmbarcacao;
    
    /** @var string */
    public string $codEmbarcacao;
    
    /** @var string */
    public string $nomeEmbarcacao;
    
    /** @var string */
    public string $numeroViagem;
    
    /** @var string */
    public string $codPortoEmbarque;
    
    /** @var string */
    public string $codPortoDestino;
}

/**
 * Class Ferroviario
 */
class Ferroviario
{
    /** @var string */
    public string $prefixo;
    
    /** @var DateTime */
    public DateTime $dataLiberacao;
    
    /** @var string */
    public string $origem;
    
    /** @var string */
    public string $destino;
    
    /** @var int */
    public int $quantidadeVagoes;        
    
    /** @var list<Vagao> */
    public array $vagoes = [];        
}

/**
 * Class Vagao
 */
class Vagao
{
    /** @var int */
    public int $serie;

    /** @var int */
    public int $numero;

    /** @var int|null */
    public ?int $sequencia;

    /** @var float */
    public float $toneladaUtil;

    /**
     * Peso Base de Cálculo de Frete em Toneladas
     * @var float
     */
    public float $pesoBc;

    /**
     * Peso Real em Toneladas
     * @var float
     */
    public float $pesoReal;
}

/**
 * Class Rodoviario
 */
class Rodoviario
{
    public function __construct()
    {
        $this->condutores = [];
    }

    /**
     * Tipo de Rodado (Padrão 1)
     * 1 - Truck
     * 2 - Toco
     * 3 - Cavalo Mecânico
     * 4 - VAN
     * 5 - Utilitário
     * 6 - Outros
     * @var int
     */
    public int $tipoRodado;
    
    /**
     * Tipo de Carroceria (Padrão 1)
     * 0 - Não aplicável
     * 1 - Aberta
     * 2 - Fechado Baú
     * 3 - Granelera
     * 4 - Porta Container
     * 5 - Sider
     * @var int
     */
    public int $tipoCarroceria;
    
    /** @var string */
    public string $placa;

    /** @var string */
    public string $renavan;
    
    /** @var string */
    public string $uf;
    
    /**
     * Tara em KG
     * @var int
     */
    public int $tara;
    
    /** @var list<Condutor> */
    public array $condutores;
}

/**
 * Class Condutor
 */
class Condutor
{
    /** @var string */
    public string $nome;

    /** @var string */
    public string $cpf;
}

/**
 * Class Carregamento
 */
class Carregamento
{
    /** @var int */
    public int $codMunicipio;

    /** @var string */
    public string $municipio;
}

/**
 * Class Descarregamento
 */
class Descarregamento
{
    public function __construct()
    {
        $this->transportePerigosos = [];
    }

    /** @var int */
    public int $codMunicipio;

    /** @var string */
    public string $municipio;

    /** @var string */
    public string $chaveDfe;

    /** @var list<TransportePerigosoInfo> */
    public array $transportePerigosos;
}

/**
 * Class TransportePerigosoInfo
 */
class TransportePerigosoInfo
{
    /** @var string */
    public string $codigoOnu;

    /** @var float */
    public float $quantidade;
}

/**
 * Class Seguro
 */
class Seguro
{
    /**
     * Identificação do Ambiente (Padrão 1)
     * 1 - Emitente do MDF-e
     * 2 - Responsável pela contratação
     * @var int
     */
    public int $indicadorResponsavel = 1;

    /** @var string */
    public string $cpfCnpjResponsavel;

    /** @var string */
    public string $cnpjSegurador;

    /** @var string */
    public string $nomeSegurador;
}