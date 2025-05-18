<?php

namespace BrasilNFeSdk\Envio\Empresa;

use BrasilNFeSdk\Envio\Outros\Pessoa;
use DateTime;

/**
 * Class ConsultarCadastroEnvio
 */
class ConsultarCadastroEnvio
{
    /** @var string */
    public string $cpfCnpjIe;

    /**
     * UF do CPF, CNPJ, IE
     * @var string
     */
    public string $uf;
}

/**
 * Class ConsultarCadastroRetorno
 */
class ConsultarCadastroRetorno extends Pessoa
{
    /** @var string */
    public string $cpfCnpj;
    
    /** @var string */
    public string $ie;
    
    /** @var string */
    public string $ieUnica;
    
    /** @var string */
    public string $ieAtual;

    /** @var string */
    public string $razaoSocial;
    
    /** @var string */
    public string $nomeFantasia;
    
    /** @var string */
    public string $regimeApuracao;
    
    /** @var string */
    public string $cnaePrincipal;
    
    /** @var DateTime|null */
    public ?DateTime $dataInicioAtividade;
    
    /** @var DateTime|null */
    public ?DateTime $dataUltimaAlteracaoCadastral;
    
    /** @var DateTime|null */
    public ?DateTime $dataOcorrenciaBaixa;

    /** @var string */
    public string $ufConsultada;

    /**
     * Situação do contribuinte: 0 - não habilitado; 1 - habilitado.
     * @var int
     */
    public int $situacao;

    /**
     * Indicador de contribuinte credenciado a emitir NF-e.
     * 0 - Não credenciado para emissão da NF-e;
     * 1 - Credenciado;
     * 2 - Credenciado com obrigatoriedade para todas operações;
     * 3 - Credenciado com obrigatoriedade parcial;
     * 4 – a SEFAZ não fornece a informação. Este indicador significa apenas que o contribuinte é credenciado para emitir NF-e na SEFAZ consultada.
     * @var int
     */
    public int $indicadorCredenciamentoNFe;

    /**
     * Indicador de contribuinte credenciado a emitir CT-e.
     * 0 - Não credenciado para emissão da CT-e;
     * 1 - Credenciado;
     * 2 - Credenciado com obrigatoriedade para todas operações;
     * 3 - Credenciado com obrigatoriedade parcial;
     * 4 – a SEFAZ não fornece a informação. Este indicador significa apenas que o contribuinte é credenciado para emitir CT-e na SEFAZ consultada.
     * @var int
     */
    public int $indicadorCredenciamentoCTe;

    /**
     * Status Consulta
     * 0 - Não Encontrada;
     * 1 - Encontrada;
     * @var int
     */
    public int $status;
}