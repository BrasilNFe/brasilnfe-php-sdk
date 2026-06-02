<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;

class EmpresaRetorno extends Erros
{
    /** @var string|null Token da empresa */
    public ?string $token = null;

    /** @var bool Status da empresa */
    public bool $status = false;

    /**
     * Eco do codigoInterno enviado no cadastro/edição, permitindo correlacionar
     * a resposta da API com o cadastro interno do ERP/sistema do integrador.
     * @var string|null
     */
    public ?string $codigoInterno = null;
}