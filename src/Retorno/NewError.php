<?php

namespace BrasilNFeSdk\Retorno;

/**
 * Class NewError
 */
class NewError
{
    public function __construct()
    {
        $this->avisos = [];
        $this->erros = [];
    }

    /** @var ErrorInfo[] */
    public array $erros = [];

    /** @var string[] */
    public array $avisos = [];

    /**
     * Status do retorno. 0: OK, 1: Aviso, 2: Erro.
     */
    public int $status = 0;

    public function addError(string $descricao): void
    {
        $this->erros[] = new ErrorInfo(codigo: "", descricao: $descricao, correcao: "");
    }

    public function addErrorWithCode(string $codigo, string $descricao): void
    {
        $this->erros[] = new ErrorInfo(codigo: $codigo, descricao: $descricao, correcao: "");
    }

    public function addCompleteError(string $codigo, string $descricao, string $correcao): void
    {
        $this->erros[] = new ErrorInfo(codigo: $codigo, descricao: $descricao, correcao: $correcao);
    }

    public function addWarning(string $descricao): void
    {
        $this->avisos[] = $descricao;
    }
}
