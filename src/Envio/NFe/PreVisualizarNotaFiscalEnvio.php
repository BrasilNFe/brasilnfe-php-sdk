<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class PreVisualizarNotaFiscalEnvio
 */
class PreVisualizarNotaFiscalEnvio
{
    /**
     * Nota fiscal para pré-visualização
     */
    public ?NotaFiscalEnvioV2 $notaFiscal = null;

    /**
     * XML em formato Base64
     */
    public ?string $base64Xml = null;

    /**
     * Tipo do arquivo que deseja pré-visualizar (Padrão - 0)
     * 0 - XML
     * 1 - PDF
     */
    public int $tipoArquivo = 0;

    /**
     * Tipo do envio no qual será convertido para o tipo do arquivo informado (Padrão - 0)
     * 0 - Base64 contendo as informações do XML
     * 1 - Objeto contendo as informações das notas fiscais
     */
    public int $tipoEnvio = 0;

    /**
     * Mostrar tarja "SEM VALOR FISCAL - PRÉ-VISUALIZAÇÃO" (Padrão - Verdadeiro)
     * Somente para o tipo de arquivo 1 - PDF
     */
    public bool $mostrarTarjaPreVisualizacao = true;
}