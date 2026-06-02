<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Envio\Empresa\Numeracao;

/**
 * Retorno de AtualizarNumeracao - confirma o estado final da numeração.
 */
class AtualizarNumeracaoRetorno extends Erros
{
    /** Status da atualização (true = sucesso). */
    public bool $status = false;

    /** Numeração após a atualização. */
    public ?Numeracao $numeracao = null;
}
