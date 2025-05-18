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
     * Tipo da empresa
     * 1 - Matriz
     * @var int
     */
    public int $tipoEmpresa = 1;

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
     * Identificador do código de segurança do contribuinte (NFC-e)
     * @var string|null
     */
    public ?string $identificadorCsc = null;

    /**
     * Código de segurança do contribuinte (NFC-e)
     * @var string|null
     */
    public ?string $codigoCsc = null;

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
        $this->nfe = new NFe();
        $this->nfce = new NFCe();
        $this->nfse = new NFSe();
        $this->servicos = new Servicos();
    }

    /**
     * Informações de NFe
     * @var NFe
     */
    public NFe $nfe;

    /**
     * Informações de NFC-e
     * @var NFCe
     */
    public NFCe $nfce;

    /**
     * Informações de NFS-e
     * @var NFSe
     */
    public NFSe $nfse;

    /**
     * Informações de Serviços
     * @var Servicos
     */
    public Servicos $servicos;
}

/**
 * Class NFSe
 */
class NFSe
{
    /**
     * Código tipo ambiente emissão NFS-e
     * 1 - Produção
     * 2 - Homologação
     * @var int
     */
    public int $codTipoAmbiente = 1;

    /**
     * Token da empresa que possui a procuração para emissão de notas
     * @var string
     */
    public string $tokenProcurador;

    /**
     * Login (somente municípios que utilizam login/senha para autenticação no webservice)
     * @var string
     */
    public string $loginWebService;

    /**
     * Senha (somente municípios que utilizam login/senha para autenticação no webservice)
     * @var string
     */
    public string $senhaWebService;

    /**
     * Cpf do usuário vinculado a empresa (somente municípios que utilizam login/senha para autenticação no webservice)
     * @var string
     */
    public string $cpfWebService;

    /**
     * Controle de série e numeração interno?
     * Verdadeiro - A série e numeração é controlado pelo Brasil NFe
     * Falso - A série e numeração é obrigatoriamente enviada pela API
     * @var bool
     */
    public bool $controleNumeracaoInterno = true;
}

/**
 * Class NFe
 */
class NFe
{
    /**
     * Código Tipo Ambiente Emissão NF-e
     * 1 - Produção
     * 2 - Homologação
     * @var int
     */
    public int $codTipoAmbiente = 1;

    /**
     * Controle de série e numeração interno?
     * Verdadeiro - A série e numeração é controlado pelo Brasil NFe
     * Falso - A série e numeração é obrigatoriamente enviada pela API
     * @var bool
     */
    public bool $controleNumeracaoInterno = true;
}

/**
 * Class NFCe
 */
class NFCe
{
    /**
     * Código Tipo Ambiente Emissão NFC-e
     * 1 - Produção
     * 2 - Homologação
     * @var int
     */
    public int $codTipoAmbiente = 1;

    /**
     * Controle de série e numeração interno?
     * Verdadeiro - A série e numeração é controlado pelo Brasil NFe
     * Falso - A série e numeração é obrigatoriamente enviada pela API
     * @var bool
     */
    public bool $controleNumeracaoInterno = true;
}

/**
 * Class Servicos
 */
class Servicos
{
    /**
     * Serviço de MDF-e/CT-e?
     * Verdadeiro - Serviço de emissão de MDF-e/CT-e ativado
     * Falso - Serviço de emissão de MDF-e/CT-e desativado
     * @var bool
     */
    public bool $mdfeCTe;

    /**
     * Serviço de NFe/NFCe?
     * Verdadeiro - Serviço de emissão de NFe/NFCe ativado
     * Falso - Serviço de emissão de NFe/NFCe desativado
     * @var bool
     */
    public bool $nfeNfce;

    /**
     * Serviço de NFSe?
     * Verdadeiro - Serviço de emissão de NFS-e ativado
     * Falso - Serviço de emissão de NFS-e desativado
     * @var bool
     */
    public bool $nfse;

    /**
     * Serviço do Sintegra?
     * Verdadeiro - Serviço de emissão de Sped ativado
     * Falso - Serviço de emissão de Sped desativado
     * @var bool
     */
    public bool $sped;

    /**
     * Serviço do Sintegra?
     * Verdadeiro - Serviço de emissão de Sintegra ativado
     * Falso - Serviço de emissão de Sintegra desativado
     * @var bool
     */
    public bool $sintegra;

    /**
     * Serviço de CF-e SAT?
     * Verdadeiro - Serviço de emissão de CF-e SAT ativado
     * Falso - Serviço de emissão de CF-e SAT desativado
     * @var bool
     */
    public bool $cfeSat;
}