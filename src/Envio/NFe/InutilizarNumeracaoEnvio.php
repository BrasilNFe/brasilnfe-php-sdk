<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class InutilizarNumeracaoEnvio
 */
class InutilizarNumeracaoEnvio
{
    /**
     * Identificação do Ambiente
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente;

    /**
     * Código do modelo do Documento Fiscal
     * 55 - NF-e
     * 65 - NFC-e
     */
    public int $modeloDocumento;

    /**
     * Série referente ao modelo do documento
     */
    public int $serie;

    /**
     * Justificativa da inutilização
     */
    public string $justificativa;

    /**
     * Início da range numérico de inutilização
     */
    public int $numeracaoInicial;

    /**
     * Final da range numérico de inutilização
     */
    public int $numeracaoFinal;
}