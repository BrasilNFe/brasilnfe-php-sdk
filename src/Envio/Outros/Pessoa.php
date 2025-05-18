<?php

namespace BrasilNFeSdk\Envio\Outros;

/**
 * Class Pessoa
 */
class Pessoa
{
    public Endereco $endereco;
    public Contato $contato;

    public function __construct()
    {
        $this->endereco = new Endereco();
        $this->contato = new Contato();
    }
}


/**
 * Class NewPessoa
 */
class NewPessoa
{
    public NewEndereco $endereco;
    public NewContato $contato;

    public function __construct()
    {
        $this->endereco = new NewEndereco();
        $this->contato = new NewContato();
    }
}

/**
 * Class NewEndereco
 */
class NewEndereco
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

/**
 * Class NewContato
 */
class NewContato
{
    public ?string $telefone = null;
    public ?string $email = null;
    public ?string $fax = null;
}