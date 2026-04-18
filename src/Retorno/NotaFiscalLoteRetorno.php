<?php

namespace BrasilNFeSdk\Retorno;

class NotaFiscalLoteListRetorno
{
    public RetornoInfo $returnNf;
    public string $base64Xml;
    public string $base64File;
    public string $identificadorInterno;
}

class NotaFiscalLoteRetorno extends Erros
{
    /** @var list<NotaFiscalLoteListRetorno> */
    public array $notas;
}
