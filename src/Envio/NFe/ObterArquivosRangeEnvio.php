<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class ObterArquivosRangeEnvio
 */
class ObterArquivosRangeEnvio
{
    /**
     * @var string[]
     */
    public array $chaves = [];

    /**
     * @var string[]
     */
    public array $cpfCnpjs = [];

    public \DateTime $dtInicio;
    public \DateTime $dtFim;

    /**
     * Tipo do documento fiscal (Padrão 1 - XML)
     * 0 - PDF
     * 1 - XML
     * 2 - EXCEL
     */
    public int $type = 1;

    /**
     * Tipo de ambiente (Padrão 1 - Produção)
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente = 1;

    /**
     * Anexar todas as notas fiscais retornadas em um unico arquivo PDF
     */
    public bool $juntarArquivosPDF = false;

    /**
     * Incluir carta de correção emitidas no periodo
     */
    public bool $incluirCCe = false;

    /**
     * Aplicar plano de ajustes de impostos
     */
    public bool $aplicarPlanoAjustes = true;

    public function __construct()
    {
        $this->chaves = [];
        $this->cpfCnpjs = [];
    }
}