<?php

use BrasilNFeSdk\BrasilNFe;
use BrasilNFeSdk\Envio\NFe\CancelarNotaFiscalEnvio;

require_once __DIR__ . '/../vendor/autoload.php';

$sdk = new BrasilNFe('TOKEN_EMPRESA');

//--------- Cancela nota fiscal

$consulta = new CancelarNotaFiscalEnvio();

$consulta->chaveNF = "123434...";
$consulta->justificativa = "Nota fiscal de teste";
$consulta->tipoDocumento = 0;

$retorno = $sdk->Eventos->cancelarNotaFiscal($consulta);

print_r($retorno->error);
echo "|";
print_r($retorno->codStatusRespostaSefaz);
echo "|";
print_r($retorno->status);