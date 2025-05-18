<?php

use BrasilNFeSdk\BrasilNFe;
use BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\PegarArquivoEnvio;

require_once __DIR__ . '/../vendor/autoload.php';

$sdk = new BrasilNFe('TOKEN_EMPRESA');

//--------- Busca lista de notas fiscais emitidas

$consulta = new BuscarNotaFiscalEnvio();

$consulta->tipoDocumentoFiscal = 1; // 1 = Saída

$consulta->dtInicio = new \DateTime('2025-05-01');
$consulta->dtFim = new \DateTime('2025-05-10');

//$consulta->indentificadorInterno = 'NF123456';

$retorno = $sdk->Consultas->buscarNotaFiscal($consulta);

// print_r($retorno->error);
// if (!empty($retorno->notas) && isset($retorno->notas[0])) {
//     echo "|";
//     print_r($retorno->notas[0]);
// }

//--------- Busca XML ou Cupom/Danfe

$consulta = new PegarArquivoEnvio();

$consulta->fileType = 2; //1 = xml, 2 = cupom
$consulta->chaveNF = "1234343...";

$retorno = $sdk->Arquivos->pegarArquivo($consulta);

//print_r($retorno);