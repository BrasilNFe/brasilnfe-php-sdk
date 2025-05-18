<?php

namespace BrasilNFeSdk\Envio\Outros;

class Endereco
{
    public ?string $cep = null;
    public ?string $logradouro = null;
    public ?string $complemento = null;
    public ?string $numero = null;
    public ?string $bairro = null;
    public ?string $codMunicipio = null;
    public ?string $municipio = null;
    public ?string $uf = null;
    public int $codPais = 1058;
    public string $pais = 'BRASIL';
}