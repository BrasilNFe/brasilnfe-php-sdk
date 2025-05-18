<?php

namespace BrasilNFeSdk\Envio\CTe;

/**
 * Class InutilizarNumeracaoCTeEnvio
 */
class InutilizarNumeracaoCTeEnvio
{
    /**
     * Identificação do Ambiente
     * 1 - Produção
     * 2 - Homologação
     * @var int
     */
    public int $tipoAmbiente;

    /**
     * Código do modelo do Documento Fiscal. 55 = NF-e; 58 = MDFe; 65 = NFC-e.
     * @var int
     */
    public int $modeloDocumento;

    /**
     * Série da nota Fiscal
     * @var int
     */
    public int $serie;

    /**
     * Justificativa da inutilização
     * @var string
     */
    public string $justificativa;

    /**
     * Inicio da range numérico de inutilização
     * @var int
     */
    public int $numeracaoInicial;

    /**
     * Inicio da range numérico de inutilização
     * @var int
     */
    public int $numeracaoFinal;
}