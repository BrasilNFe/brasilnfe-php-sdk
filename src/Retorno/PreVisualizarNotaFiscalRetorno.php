<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class PreVisualizarNotaFiscalRetorno
 */
class PreVisualizarNotaFiscalRetorno extends Erros
{
    /** @var bool Status da pré-visualização */
    public bool $status;

    /** @var string Conteúdo do arquivo em base64 */
    public string $base64File;
}