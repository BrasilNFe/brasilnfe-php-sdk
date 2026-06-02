<?php

namespace BrasilNFeSdk\Retorno;

/**
 * Class ErrorInfo
 */
class ErrorInfo
{
    /** @var string|null */
    public ?string $codigo = null;

    /** @var string|null */
    public ?string $descricao = null;

    /** @var string|null */
    public ?string $correcao = null;

    public function __construct(string $codigo = "", string $descricao = "", string $correcao = "")
    {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->correcao = $correcao;
    }
}
