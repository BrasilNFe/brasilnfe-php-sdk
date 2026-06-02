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
    
    /** @var Aereo|null */
    public ?Aereo $aereo;
    
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

    /**
     * Produto predominante transportado. Opcional.
     * @var ProdutoPredominante|null
     */
    public ?ProdutoPredominante $produtoPredominante;
}

/**
 * Class Aereo
 */
class Aereo
{
    /** @var string */
    public string $nacionalidade;

    /** @var string */
    public string $matricula;

    /** @var string */
    public string $numeroVoo;

    /** @var string */
    public string $aerodromoEmbarque;

    /** @var string */
    public string $aerodromoDestino;

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

    /**
     * Capacidade em KG do veículo de tração. Opcional.
     * @var int|null
     */
    public ?int $capKG;

    /**
     * Capacidade em M3 do veículo de tração. Opcional.
     * @var int|null
     */
    public ?int $capM3;

    /** @var CIOT|null */
    public ?CIOT $ciot;

    /** @var list<Condutor> */
    public array $condutores;

    /**
     * Lista de veículos de reboque acoplados à tração. Opcional.
     * @var list<VeiculoReboque>
     */
    public array $reboques = [];
}

/**
 * Class VeiculoReboque
 */
class VeiculoReboque
{
    /**
     * Placa do reboque (sem máscara).
     * @var string
     */
    public string $placa;

    /** @var string */
    public string $renavan;

    /**
     * UF de licenciamento do reboque (sigla de 2 letras).
     * @var string
     */
    public string $uf;

    /**
     * Tara em KG
     * @var int|null
     */
    public ?int $tara;

    /** @var int|null */
    public ?int $capKG;

    /** @var int|null */
    public ?int $capM3;

    /**
     * Tipo de Carroceria
     * 0 - Não aplicável
     * 1 - Aberta
     * 2 - Fechado Baú
     * 3 - Granelera
     * 4 - Porta Container
     * 5 - Sider
     * @var int
     */
    public int $tipoCarroceria;
}

/**
 * Class ProdutoPredominante
 */
class ProdutoPredominante
{
    /**
     * Tipo de Carga (Resolução ANTT 5.849/2019). Valor de 1 a 11.
     * 1 - Granel sólido
     * 2 - Granel líquido
     * 3 - Frigorificada
     * 4 - Conteinerizada
     * 5 - Carga Geral
     * 6 - Neogranel
     * 7 - Perigosa (granel sólido)
     * 8 - Perigosa (granel líquido)
     * 9 - Perigosa (carga frigorificada)
     * 10 - Perigosa (conteinerizada)
     * 11 - Perigosa (carga geral)
     * @var int
     */
    public int $tpCarga;

    /**
     * Descrição do produto predominante (1 a 120 caracteres).
     * @var string
     */
    public string $descricao;

    /**
     * GTIN/EAN do produto. Opcional. Use "SEM GTIN" se não houver.
     * @var string
     */
    public string $cEan;

    /**
     * Código NCM do produto. Opcional. Aceita 2 ou 8 dígitos.
     * @var string
     */
    public string $ncm;

    /**
     * Informações de carga lotação. Opcional - só preencha quando o MDF-e for de carga lotação.
     * @var InfoCargaLotacao|null
     */
    public ?InfoCargaLotacao $infLotacao;
}

/**
 * Class InfoCargaLotacao
 */
class InfoCargaLotacao
{
    /**
     * Local de carregamento da lotação. Informe CEP OU (latitude + longitude).
     * @var LocalLotacao|null
     */
    public ?LocalLotacao $localCarrega;

    /**
     * Local de descarregamento da lotação. Informe CEP OU (latitude + longitude).
     * @var LocalLotacao|null
     */
    public ?LocalLotacao $localDescarrega;
}

/**
 * Class LocalLotacao
 */
class LocalLotacao
{
    /**
     * CEP do local (8 dígitos). Quando informado, latitude/longitude são ignorados.
     * @var string
     */
    public string $cep;

    /**
     * Latitude. Informe junto com longitude quando não houver CEP.
     * @var string
     */
    public string $latitude;

    /**
     * Longitude. Informe junto com latitude quando não houver CEP.
     * @var string
     */
    public string $longitude;
}

/**
 * Class CIOT
 */
class CIOT
{
    /** @var string */
    public string $codigo;

    /** @var string */
    public string $cnpj;
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

    /**
     * Número da apólice de seguro. Obrigatório para modal rodoviário no MDF-e versão 3.00.
     * @var string
     */
    public string $numeroApolice;

    /**
     * Lista de números de averbação do seguro (0..N). Opcional.
     * @var list<string>
     */
    public array $numerosAverbacao = [];
}