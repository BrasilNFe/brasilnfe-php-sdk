<?php

use BrasilNFeSdk\BrasilNFe;
use BrasilNFeSdk\Envio\Empresa\CertificadoEnvio;
use BrasilNFeSdk\Envio\Empresa\EmpresaEnvio;

require_once __DIR__ . '/../vendor/autoload.php';

$sdk = new BrasilNFe('TOKEN_EMPRESA', 'TOKEN_USUARIO');

//--------- Busca uma empresa

$retorno = $sdk->Empresa->buscarEmpresa();

// print_r($retorno);

//--------- Busca todas empresa

$retorno = $sdk->Empresa->buscarTodasEmpresas();

// if (!empty($retorno) && isset($retorno[0])) {
//     echo "|";
//     print_r($retorno[0]);
// } else {
//     print_r('Sem empresas cadastradas');
// }

//--------- Verificar Certificado

$certificado = new CertificadoEnvio();
$certificado->interno = true;
// $certificado->senha = "12345";
// $certificado->base64CertificateFile = "...";

$retorno = $sdk->Empresa->verificarCertificado($certificado);

//--------- Alterar Certificado

$certificado->senha = "12345";
$certificado->base64CertificateFile = "...";
// $retorno = $sdk->Empresa->alterarCertificado($certificado);

print_r($retorno);

//--------- Adicionar/Editar Empresa

$empresa = new EmpresaEnvio();

$empresa->cnpj = "39.658.743/0001-99";
$empresa->nmFantasia = "BRASIL NFE LTDA";
$empresa->rzSocial = "BRASIL NFE LTDA";
$empresa->tipoEmpresa = 1;
$empresa->ie = "ISENTO";
$empresa->im = "255762";
$empresa->crt = 1;
$empresa->cnae = null;
$empresa->identificadorCsc = null;
$empresa->codigoCsc = null;
$empresa->site = "www.brasilnfe.com.br";
$empresa->codGrupo = null;

// Endereço
$empresa->endereco->cep = "";
$empresa->endereco->logradouro = "";
$empresa->endereco->complemento = null;
$empresa->endereco->numero = "";
$empresa->endereco->bairro = "";
$empresa->endereco->codMunicipio = "";
$empresa->endereco->municipio = "";
$empresa->endereco->uf = "MG";
$empresa->endereco->codPais = 1058;
$empresa->endereco->pais = "BRASIL";

// Contato
$empresa->contato->telefone = null;
$empresa->contato->email = "";
$empresa->contato->fax = null;

$retorno = $sdk->Empresa->adicionarEmpresa($empresa);

print_r($retorno);

//$retorno = $sdk->Empresa->editarEmpresa($empresa);
//print_r($retorno);