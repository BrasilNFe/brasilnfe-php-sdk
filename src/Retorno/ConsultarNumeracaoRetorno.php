<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Envio\Empresa\Numeracao;

/**
 * Retorno de ConsultarNumeracao - lista de numerações da empresa.
 */
class ConsultarNumeracaoRetorno extends Erros
{
    public function __construct()
    {
        parent::__construct();
        $this->numeracoes = [];
    }

    /** Status da consulta (true = sucesso). */
    public bool $status = false;

    /** @var list<Numeracao> */
    public array $numeracoes;
}
