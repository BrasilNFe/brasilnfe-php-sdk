<?php

namespace BrasilNFeSdk\Envio\Empresa;

use BrasilNFeSdk\Envio\Outros\Contato;
use BrasilNFeSdk\Envio\Outros\Endereco;

class EmpresaEnvio
{
    public function __construct()
    {
        $this->contato = new Contato();
        $this->endereco = new Endereco();
        $this->configuracao = new Configuracao();
    }

    /**
     * CNPJ
     * @var string|null
     */
    public ?string $cnpj = null;

    /**
     * Código de identificação da empresa no sistema do integrador.
     * Campo opcional e livre, usado pelo integrador para correlacionar a
     * empresa do Brasil NFe com o cadastro interno do próprio ERP/sistema.
     * @var string|null
     */
    public ?string $codigoInterno = null;

    /**
     * Nome Fantasia
     * @var string|null
     */
    public ?string $nmFantasia = null;

    /**
     * Razão Social
     * @var string|null
     */
    public ?string $rzSocial = null;

    /**
     * Inscrição Estadual
     * @var string|null
     */
    public ?string $ie = null;

    /**
     * Inscrição Municipal
     * @var string|null
     */
    public ?string $im = null;

    /**
     * Código Regime Tributário
     * 1 - Simples Nacional
     * 2 - Simples Nacional - Excesso Sublimite
     * 3 - Regime Normal
     * @var int
     */
    public int $crt;

    /**
     * CNAE
     * @var string|null
     */
    public ?string $cnae = null;

    /**
     * Token Brasil NFe (Somente para consulta)
     * @var string|null
     */
    public ?string $token = null;

    /**
     * Site da empresa
     * @var string|null
     */
    public ?string $site = null;

    /**
     * Código do grupo
     * @var int|null
     */
    public ?int $codGrupo = null;

    /**
     * Informações de endereço
     * @var Endereco|null
     */
    public ?Endereco $endereco = null;

    /**
     * Informações de contato
     * @var Contato|null
     */
    public ?Contato $contato = null;

    /**
     * Configurações da empresa
     * @var Configuracao|null
     */
    public ?Configuracao $configuracao = null;
}

/**
 * Class Configuracao
 */
class Configuracao
{
    public function __construct()
    {
        $this->nfse = new NFSe();
        $this->nfe = new NFe();
        $this->nfce = new NFCe();
        $this->transportador = new Transportador();
    }

    /**
     * Informações de NFS-e
     * @var NFSe
     */
    public NFSe $nfse;

    /**
     * Informações de NF-e
     * @var NFe
     */
    public NFe $nfe;

    /**
     * Informações de NFC-e
     * @var NFCe
     */
    public NFCe $nfce;

    /**
     * Informações da empresa como transportador, comuns aos documentos de
     * transporte (CT-e e MDF-e).
     * @var Transportador
     */
    public Transportador $transportador;
}

/**
 * Class Transportador
 */
class Transportador
{
    /**
     * Registro Nacional de Transportadores Rodoviários de Cargas (RNTRC) da ANTT.
     * Obrigatório para emissão de CT-e (modelo 57) e MDF-e (modelo 58) quando o
     * emitente atua como transportador rodoviário.
     * @var string|null
     */
    public ?string $rntrc = null;
}

/**
 * Class NFCe
 */
class NFCe
{
    /**
     * Identificador do código de segurança do contribuinte (Ambiente de Produção)
     * @var string|null
     */
    public ?string $idCSCProducao = null;

    /**
     * Código de segurança do contribuinte (Ambiente de Produção)
     * @var string|null
     */
    public ?string $cscProducao = null;

    /**
     * Identificador do código de segurança do contribuinte (Ambiente de Homologação)
     * @var string|null
     */
    public ?string $idCSCHomologacao = null;

    /**
     * Código de segurança do contribuinte (Ambiente de Homologação)
     * @var string|null
     */
    public ?string $cscHomologacao = null;
}

/**
 * Class NFe
 */
class NFe
{
    /**
     * Manifestar ciência da operação automaticamente (Permite buscar notas de entrada)
     * @var bool
     */
    public bool $autoManifestarCienciaOperacao = false;
}

/**
 * Class NFSe
 */
class NFSe
{
    /**
     * Token da empresa que possui a procuração para emissão de notas
     * @var string|null
     */
    public ?string $tokenProcurador = null;

    /**
     * Login (somente municípios que utilizam login/senha para autenticação no webservice)
     * @var string|null
     */
    public ?string $loginWebService = null;

    /**
     * Senha (somente municípios que utilizam login/senha para autenticação no webservice)
     * @var string|null
     */
    public ?string $senhaWebService = null;

    /**
     * Cpf do usuário vinculado a empresa (somente municípios que utilizam login/senha para autenticação no webservice)
     * @var string|null
     */
    public ?string $cpfWebService = null;
}
