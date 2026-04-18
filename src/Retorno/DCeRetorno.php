<?php

namespace BrasilNFeSdk\Retorno;

class DCeRetorno extends NewError
{
    public int $serie = 0;
    public int $numero = 0;
    public ?string $chave = null;
    public ?string $tipoAmbiente = null;
    public ?string $base64Xml = null;
    public ?string $base64DACE = null;

    /**
     * Status do retorno: 1 = Processado, 2 = Erro de validação, 3 = Erro SEFAZ
     */
    public int $status = 0;
}
