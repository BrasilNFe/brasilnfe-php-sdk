<?php

namespace BrasilNFeSdk\Retorno;

/**
 * Class Erros
 */
class Erros
{
    public function __construct()
    {
        $this->avisos = [];
    }

    public ?string $error = "";

    public ?array $avisos = [];
}

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

/**
 * Class ErrorInfo
 */
class ErrorInfo
{
    /** @var string */
    public string $codigo;
    
    /** @var string */
    public string $descricao;
    
    /** @var string */
    public string $correcao;

    public function __construct(string $codigo = "", string $descricao = "", string $correcao = "")
    {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->correcao = $correcao;
    }
}