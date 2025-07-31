<?php
require_once __DIR__ . '/../vendor/autoload.php';

use BrasilNFeSdk\BrasilNFe;
use BrasilNFeSdk\Envio\NFe\COFINS;
use BrasilNFeSdk\Envio\NFe\ICMS;
use BrasilNFeSdk\Envio\NFe\Imposto;
use BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\Pagamento;
use BrasilNFeSdk\Envio\NFe\PIS;
use BrasilNFeSdk\Envio\NFe\Produto;

$sdk = new BrasilNFe('TOKEN_EMPRESA');

$nota = new NotaFiscalEnvio();

$nota->indicadorPresenca = 1;
$nota->consumidorFinal = true;
$nota->naturezaOperacao = "Venda de produto do estabelecimento";
$nota->modeloDocumento = 65;
$nota->finalidade = 1;
$nota->tipoAmbiente = 2;
$nota->observacao = "";
$nota->identificadorInterno = "218";

$nota->cliente->cpfCnpj = "921.091.130-06";
$nota->cliente->nmCliente = "Cliente Teste";
$nota->cliente->indicadorIe = 9;
$nota->cliente->ie = "";

$nota->cliente->endereco->cep = "30130-001";
$nota->cliente->endereco->logradouro = "Teste Logradouro";
$nota->cliente->endereco->complemento = "PARTE";
$nota->cliente->endereco->numero = "123";
$nota->cliente->endereco->bairro = "Teste Bairro";
$nota->cliente->endereco->municipio = "Belo Horizonte";
$nota->cliente->endereco->codMunicipio = 3106200;
$nota->cliente->endereco->uf = "MG";
$nota->cliente->endereco->codPais = 1058;
$nota->cliente->contato->telefone = "";
$nota->cliente->contato->email = "";

$produto = new Produto();
$produto->codProdutoServico = "1";
$produto->nmProduto = "teste";
$produto->ean = "";
$produto->ncm = "85102000";
$produto->cest = "";
$produto->quantidade = 1;
$produto->unidadeComercial = "UN";
$produto->valorDesconto = 0;
$produto->valorFrete = 0.0;
$produto->valorUnitario = 1.00;
$produto->valorTotal = 1.00;
$produto->cfop = 5102;
$produto->codTributacao = "";

$imposto = new Imposto();

$icms = new ICMS();
$icms->codSituacaoTributaria = "00";
$icms->aliquotaICMS = 0;
$imposto->icms = $icms;

$pis = new PIS();
$pis->codSituacaoTributaria = "99";
$pis->aliquota = 0;
$imposto->pis = $pis;

$cofins = new COFINS();
$cofins->codSituacaoTributaria = "99";
$cofins->aliquota = 0;
$imposto->cofins = $cofins;

$produto->imposto = $imposto;
$nota->produtos[] = $produto;

$pagamento = new Pagamento();
$pagamento->indicadorPagamento = 0;
$pagamento->desconto = 0;
$pagamento->formaPagamento = "01";
$pagamento->vlPago = 1.0;
$pagamento->vlTroco = 0;
$pagamento->tipoIntegracao = 0;
$pagamento->bandeiraOperadora = 0;
$nota->pagamentos[] = $pagamento;

$nota->transporte->modalidadeFrete = 9;

$retorno = $sdk->NotaFiscal->enviarNotaFiscal($nota);

print_r($retorno->error);
echo "|";
print_r($retorno->returnNF->codStatusRespostaSefaz);
echo "|";
print_r($retorno->returnNF->dsStatusRespostaSefaz);
echo "|";
print_r($retorno->returnNF->ok);