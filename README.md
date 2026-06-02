# Brasil NFe PHP SDK

[![Packagist Version](https://img.shields.io/badge/packagist-v1.2.0-blue.svg?style=flat-square)](https://packagist.org/packages/brasilnfe/brasilnfe-php-sdk)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.0-777bb4.svg?style=flat-square)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/license-MIT-green.svg?style=flat-square)](https://opensource.org/licenses/MIT)

SDK oficial em **PHP** para integração com a API da **[Brasil NFe](https://www.brasilnfe.com.br)**. Permite emitir, consultar, cancelar e gerenciar documentos fiscais eletrônicos (NF-e, NFC-e, CT-e, MDF-e, NFS-e, DC-e, NF3-e) e arquivos fiscais (SPED, Sintegra, FCI), de forma orientada a objetos com tipagem forte e serialização automática.

> Equivalente em PHP ao pacote [`brasilnfe`](https://www.npmjs.com/package/brasilnfe) (Node.js / TypeScript).

---

## Índice

- [Sobre a Brasil NFe](#sobre-a-brasil-nfe)
- [Recursos](#recursos)
- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Configuração Inicial](#configuração-inicial)
- [Arquitetura do SDK](#arquitetura-do-sdk)
- [Guia Rápido](#guia-rápido)
- [Exemplos](#exemplos)
  - [1. Emitir NF-e (modelo 55)](#1-emitir-nf-e-modelo-55)
  - [2. Emitir NFC-e (modelo 65)](#2-emitir-nfc-e-modelo-65)
  - [3. Emitir NF-e em lote](#3-emitir-nf-e-em-lote)
  - [4. Emitir NFS-e](#4-emitir-nfs-e)
  - [5. Emitir CT-e](#5-emitir-ct-e)
  - [6. Cancelar NF-e](#6-cancelar-nf-e)
  - [7. Carta de Correção (CC-e)](#7-carta-de-correção-cc-e)
  - [8. Inutilizar numeração](#8-inutilizar-numeração)
  - [9. Manifestar NF-e de entrada](#9-manifestar-nf-e-de-entrada)
  - [10. Consultar status da SEFAZ](#10-consultar-status-da-sefaz)
  - [11. Buscar notas por período](#11-buscar-notas-por-período)
  - [12. Baixar XML / DANFE](#12-baixar-xml--danfe)
  - [13. Gerar SPED e Sintegra](#13-gerar-sped-e-sintegra)
  - [14. Gestão de empresas e certificados](#14-gestão-de-empresas-e-certificados)
- [Referência de Métodos](#referência-de-métodos)
- [Tratamento de Erros](#tratamento-de-erros)
- [Tabelas de Referência](#tabelas-de-referência)
- [Ambientes](#ambientes)
- [Como o SDK serializa o payload](#como-o-sdk-serializa-o-payload)
- [Utilitário BrasilNFeHelper](#utilitário-brasilnfehelper)
- [Testes](#testes)
- [Licença](#licença)
- [Suporte](#suporte)

---

## Sobre a Brasil NFe

A **Brasil NFe** oferece uma API REST para emissão de notas fiscais e documentos eletrônicos, com foco em estabilidade, performance e conformidade com a legislação brasileira.

- **Site oficial:** https://www.brasilnfe.com.br
- **Documentação da API:** https://www.brasilnfe.com.br/docs

---

## Recursos

O SDK cobre todos os módulos da API REST da Brasil NFe:

- **Emissão de documentos fiscais**
  - NF-e (modelo 55)
  - NFC-e (modelo 65)
  - NFS-e (nota fiscal de serviço)
  - CT-e (modelo 57)
  - MDF-e (modelo 58)
  - DC-e (Declaração de Conteúdo)
  - NF3-e / NF-e de Energia (`NFEnerCom`)
  - Nota Fiscal Complementar
  - Envio em lote
- **Eventos**
  - Cancelamento
  - Carta de Correção (CC-e)
  - Inutilização de numeração
  - Manifestação do Destinatário
  - Encerramento de MDF-e
- **Consultas**
  - Status SEFAZ
  - Consulta de Cadastro (IE/CNPJ)
  - Busca de notas por período
  - Pré-visualização de DANFE
  - Cálculo de impostos
- **Arquivos fiscais**
  - Download de XML e DANFE
  - SPED Fiscal e Contribuições (individual e unificado)
  - Sintegra
  - FCI (Ficha de Conteúdo de Importação)
  - Arquivos por range de chaves
- **Gestão**
  - Cadastro e edição de empresas
  - Envio e verificação de certificados digitais A1

---

## Requisitos

- PHP **>= 8.0**
- Extensões `curl` e `json` habilitadas
- Composer
- Token de acesso válido do painel Brasil NFe

---

## Instalação

Via Composer:

```bash
composer require brasilnfe/brasilnfe-php-sdk
```

Ou, se estiver usando o SDK localmente, adicione ao seu `composer.json`:

```json
{
    "require": {
        "brasilnfe/brasilnfe-php-sdk": "^1.1"
    }
}
```

E rode:

```bash
composer install
```

---

## Configuração Inicial

A classe principal é [`BrasilNFe`](src/BrasilNFe.php). Com um **Token** você já tem acesso a todos os módulos fiscais. O **UserToken** é opcional e só é necessário para o módulo de gestão de empresas/certificados.

```php
<?php

require 'vendor/autoload.php';

use BrasilNFeSdk\BrasilNFe;

$token     = 'SEU_TOKEN_AQUI';     // Token da empresa (obrigatório)
$userToken = 'SEU_USER_TOKEN';     // Token do usuário (opcional, p/ Empresa)

$bnfe = new BrasilNFe($token, $userToken);

// Por padrão o SDK aponta para https://api.brasilnfe.com.br/services/
// Para sobrescrever (ex.: ambiente interno / sandbox específico):
$bnfe = new BrasilNFe($token, $userToken, 'https://api.brasilnfe.com.br/services/');
```

> A definição de **produção** x **homologação** não é feita pela URL: é controlada pelo campo `tipoAmbiente` (`1 = Produção`, `2 = Homologação`) de cada requisição.

---

## Arquitetura do SDK

A instância `BrasilNFe` agrega cinco módulos públicos:

| Módulo       | Propriedade         | Classe                                                                   | Responsabilidade                                      |
|--------------|---------------------|--------------------------------------------------------------------------|--------------------------------------------------------|
| Nota Fiscal  | `$bnfe->NotaFiscal` | [`Methods\NotaFiscal`](src/Methods/NotaFiscal.php)                       | Emissão de NF-e, NFC-e, NFS-e, CT-e, MDF-e, DC-e, NF3-e |
| Eventos      | `$bnfe->Eventos`    | [`Methods\Eventos`](src/Methods/Eventos.php)                             | Cancelamento, CC-e, inutilização, manifestação        |
| Consultas    | `$bnfe->Consultas`  | [`Methods\Consultas`](src/Methods/Consultas.php)                         | Status SEFAZ, busca, cadastro, cálculo de impostos    |
| Arquivos     | `$bnfe->Arquivos`   | [`Methods\Arquivos`](src/Methods/Arquivos.php)                           | XML, DANFE, SPED, Sintegra, FCI                        |
| Empresa      | `$bnfe->Empresa`    | [`Methods\Empresa`](src/Methods/Empresa.php)                             | Cadastro de empresas e certificados (requer UserToken) |

Estrutura de diretórios:

```
src/
├── BrasilNFe.php          # Classe agregadora
├── BrasilNFeRequest.php   # Camada HTTP + serialização
├── Methods/               # Módulos de alto nível
├── Envio/                 # DTOs de entrada (payloads)
│   ├── NFe/
│   ├── CTe/
│   ├── MDFe/
│   ├── Empresa/
│   └── Outros/
└── Retorno/               # DTOs de retorno da API
```

---

## Guia Rápido

```php
<?php

require 'vendor/autoload.php';

use BrasilNFeSdk\BrasilNFe;
use BrasilNFeSdk\Envio\NFe\StatusSefazEnvio;

$bnfe = new BrasilNFe('SEU_TOKEN');

$req = new StatusSefazEnvio();
$req->modeloDocumento = 55;
$req->tipoAmbiente    = 2; // homologação

$resp = $bnfe->Consultas->consultarStatusSefaz($req);

echo $resp->statusSefaz->dsStatusRespostaSefaz ?? 'indisponível';
```

---

## Exemplos

### 1. Emitir NF-e (modelo 55)

```php
<?php

use BrasilNFeSdk\BrasilNFe;
use BrasilNFeSdk\Envio\NFe\{NotaFiscalEnvio, Produto, Pagamento, Volume};

$bnfe = new BrasilNFe('SEU_TOKEN');

$nf = new NotaFiscalEnvio();
$nf->tipoAmbiente       = 2;           // 1=Produção, 2=Homologação
$nf->modeloDocumento    = 55;          // NF-e
$nf->finalidade         = 1;           // Normal
$nf->naturezaOperacao   = 'VENDA DE MERCADORIA';
$nf->indicadorPresenca  = 1;
$nf->consumidorFinal    = false;
$nf->enviarEmail        = true;

// Destinatário
$nf->cliente->cpfCnpj     = '00000000000191';
$nf->cliente->nmCliente   = 'EMPRESA EXEMPLO LTDA';
$nf->cliente->indicadorIe = 1;         // Contribuinte ICMS
$nf->cliente->ie          = '123456789';
$nf->cliente->email       = 'financeiro@cliente.com.br';
$nf->cliente->endereco->logradouro   = 'Av. Industrial';
$nf->cliente->endereco->numero       = '500';
$nf->cliente->endereco->bairro       = 'Distrito Industrial';
$nf->cliente->endereco->codMunicipio = '3550308';
$nf->cliente->endereco->municipio    = 'São Paulo';
$nf->cliente->endereco->uf           = 'SP';
$nf->cliente->endereco->cep          = '01000000';

// Produto
$produto = new Produto();
$produto->codProdutoServico = 'COD-100';
$produto->nmProduto         = 'PARAFUSADEIRA ELETRICA 220V';
$produto->ncm               = '84672100';
$produto->cfop              = 5102;
$produto->unidadeComercial  = 'UN';
$produto->quantidade        = 2;
$produto->valorUnitario     = 150.00;
$produto->valorTotal        = 300.00;
$produto->origemProduto     = 0;

$produto->imposto->icms->codSituacaoTributaria   = '102';
$produto->imposto->icms->aliquotaICMS            = 0;
$produto->imposto->pis->codSituacaoTributaria    = '99';
$produto->imposto->pis->aliquota                 = 0;
$produto->imposto->cofins->codSituacaoTributaria = '99';
$produto->imposto->cofins->aliquota              = 0;

$nf->produtos[] = $produto;

// Pagamento
$pagamento = new Pagamento();
$pagamento->indicadorPagamento = 0;     // À vista
$pagamento->formaPagamento     = '15';  // Boleto
$pagamento->vlPago             = 300.00;
$nf->pagamentos[] = $pagamento;

// Transporte
$nf->transporte->modalidadeFrete = 0;   // CIF
$volume = new Volume();
$volume->quantidadeVolume = 2;
$volume->especie          = 'CAIXA';
$volume->pesoBruto        = 5.500;
$volume->pesoLiquido      = 5.000;
$nf->transporte->volumes = [$volume];

try {
    $resposta = $bnfe->NotaFiscal->enviarNotaFiscal($nf);

    if ($resposta->returnNF->ok) {
        echo "NF-e autorizada!\n";
        echo "Chave:     {$resposta->returnNF->chaveNf}\n";
        echo "Protocolo: {$resposta->returnNF->numero}\n";
        echo "PDF:       " . ($resposta->base64File ? 'recebido' : 'não gerado') . "\n";
    } else {
        echo "Rejeitada: {$resposta->returnNF->dsStatusRespostaSefaz}\n";
    }
} catch (\Exception $e) {
    echo "Erro de comunicação: {$e->getMessage()}\n";
}
```

### 2. Emitir NFC-e (modelo 65)

```php
use BrasilNFeSdk\Envio\NFe\{NotaFiscalEnvio, Produto, Pagamento};

$nfce = new NotaFiscalEnvio();
$nfce->tipoAmbiente      = 2;
$nfce->modeloDocumento   = 65;       // NFC-e
$nfce->finalidade        = 1;
$nfce->naturezaOperacao  = 'VENDA AO CONSUMIDOR';
$nfce->indicadorPresenca = 1;
$nfce->consumidorFinal   = true;     // obrigatório na NFC-e

$nfce->cliente->cpfCnpj = '12345678909'; // opcional em valores baixos

$item = new Produto();
$item->codProdutoServico = 'REFRI-LATA';
$item->nmProduto         = 'REFRIGERANTE LATA 350ML';
$item->ncm               = '22021000';
$item->cfop              = 5102;
$item->unidadeComercial  = 'UN';
$item->quantidade        = 1;
$item->valorUnitario     = 5.00;
$item->valorTotal        = 5.00;
$item->origemProduto     = 0;
$item->imposto->icms->codSituacaoTributaria   = '102';
$item->imposto->pis->codSituacaoTributaria    = '99';
$item->imposto->cofins->codSituacaoTributaria = '99';
$nfce->produtos[] = $item;

$pag = new Pagamento();
$pag->indicadorPagamento = 0;
$pag->formaPagamento     = '03';   // Cartão de crédito
$pag->vlPago             = 5.00;
$pag->bandeiraOperadora  = '01';   // Visa
$nfce->pagamentos[] = $pag;

$resposta = $bnfe->NotaFiscal->enviarNotaFiscal($nfce);
```

### 3. Emitir NF-e em lote

```php
use BrasilNFeSdk\Envio\NFe\{NotaFiscalLoteEnvio, NFInfo};

$lote = new NotaFiscalLoteEnvio();
$lote->tipoAmbiente    = 2;
$lote->modeloDocumento = 55;

foreach ($pedidos as $pedido) {
    $nf = new NFInfo();
    // …preencher como no exemplo 1
    $lote->nfInfos[] = $nf;
}

$resp = $bnfe->NotaFiscal->enviarNotaFiscalLote($lote);

foreach ($resp->notas as $nota) {
    echo "{$nota->identificadorInterno}: {$nota->returnNf->chaveNf}\n";
}
```

### 4. Emitir NFS-e

```php
use BrasilNFeSdk\Envio\NFSe\{NotaFiscalServicoEnvio, NFSInfo};

$nfse = new NotaFiscalServicoEnvio();
$nfse->tipoAmbiente = 2;

$info = new NFSInfo();
$info->tomador->cpfCnpj = '00000000000191';
$info->servico->descricao    = 'Consultoria em tecnologia';
$info->servico->valores->valorServico = 1500.00;
$nfse->nFSInfo[] = $info;

$resp = $bnfe->NotaFiscal->enviarNotaFiscalServico($nfse);
```

### 5. Emitir CT-e

```php
use BrasilNFeSdk\Envio\CTe\CTeEnvio;

$cte = new CTeEnvio();
// preencha remetente, destinatário, tomador, serviço, carga, etc.
$resp = $bnfe->NotaFiscal->enviarConhecimentoTransporte($cte);
```

### 6. Cancelar NF-e

```php
use BrasilNFeSdk\Envio\NFe\CancelarNotaFiscalEnvio;

$cancel = new CancelarNotaFiscalEnvio();
$cancel->chaveNF         = '35230100000000000000550010000000011000000000';
$cancel->numeroProtocolo = '135230000000000';
$cancel->justificativa   = 'Erro de digitação no valor do produto';

$resp = $bnfe->Eventos->cancelarNotaFiscal($cancel);
echo $resp->status ?? 'ok';
```

### 7. Carta de Correção (CC-e)

```php
use BrasilNFeSdk\Envio\NFe\CartaCorrecaoEnvio;

$cce = new CartaCorrecaoEnvio();
$cce->tipoAmbiente     = 1;
$cce->chaveNF          = '35230100000000000000550010000000011000000000';
$cce->correcao         = 'Correção na descrição do produto item 1';
$cce->numeroSequencial = 1;

$bnfe->Eventos->enviarCartaCorrecao($cce);
```

### 8. Inutilizar numeração

```php
use BrasilNFeSdk\Envio\NFe\InutilizarNumeracaoEnvio;

$inut = new InutilizarNumeracaoEnvio();
$inut->tipoAmbiente     = 1;
$inut->modeloDocumento  = 55;
$inut->serie            = 1;
$inut->numeracaoInicial = 101;
$inut->numeracaoFinal   = 105;
$inut->justificativa    = 'Falha no sistema durante emissão sequencial';

$bnfe->Eventos->inutilizarNumeracao($inut);
```

### 9. Manifestar NF-e de entrada

```php
use BrasilNFeSdk\Envio\NFe\ManifestarNotaFiscalEnvio;

$evt = new ManifestarNotaFiscalEnvio();
$evt->chave            = '35230100000000000000550010000000011000000000';
$evt->tipoAmbiente     = 1;
$evt->tipoManifestacao = 1; // 1=Confirmação, 2=Ciência, 3=Desconhecimento, 4=Não realizada

$bnfe->Eventos->manifestarNotaFiscal($evt);
```

### 10. Consultar status da SEFAZ

```php
use BrasilNFeSdk\Envio\NFe\StatusSefazEnvio;

$req = new StatusSefazEnvio();
$req->tipoAmbiente    = 2;
$req->modeloDocumento = 55;

$resp = $bnfe->Consultas->consultarStatusSefaz($req);
echo $resp->statusSefaz->dsStatusRespostaSefaz;
```

### 11. Buscar notas por período

```php
use BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalEnvio;

$busca = new BuscarNotaFiscalEnvio();
$busca->tipoDocumentoFiscal = 1;                 // 0=Entradas, 1=Saídas
$busca->dtInicio = new \DateTime('2026-04-01');
$busca->dtFim    = new \DateTime('2026-04-18');

$resp = $bnfe->Consultas->obterNotasFiscais($busca);
```

### 12. Baixar XML / DANFE

```php
use BrasilNFeSdk\Envio\NFe\PegarArquivoEnvio;

$req = new PegarArquivoEnvio();
$req->chaveNF  = '35230100000000000000550010000000011000000000';
$req->fileType = 2;                // 1=XML, 2=DANFE/Cupom
$req->tipoDocumentoFiscal = 1;     // 0=Entrada, 1=Saída

$bytes = $bnfe->Arquivos->obterArquivoNotaFiscal($req);   // já vem decodificado de base64
file_put_contents('danfe.pdf', $bytes);
```

### 13. Gerar SPED e Sintegra

```php
use BrasilNFeSdk\Envio\Outros\{SpedEnvio, SintegraEnvio};

$sped = new SpedEnvio();
// preencha período, tipo, finalidade…
$resp = $bnfe->Arquivos->gerarArquivoSped($sped);

$sintegra = new SintegraEnvio();
$resp = $bnfe->Arquivos->gerarArquivoSintegra($sintegra);
```

### 14. Gestão de empresas e certificados

> Requer `userToken` no construtor de `BrasilNFe`.

```php
use BrasilNFeSdk\Envio\Empresa\{EmpresaEnvio, CertificadoEnvio};

$bnfe = new BrasilNFe('TOKEN', 'USER_TOKEN');

// Cadastro
$empresa = new EmpresaEnvio();
$empresa->cnpj     = '00000000000191';
$empresa->rzSocial = 'EMPRESA EXEMPLO LTDA';
$empresa->crt      = 1;   // 1=Simples, 3=Regime Normal
$bnfe->Empresa->adicionarEmpresa($empresa);

// Certificado A1
$cert = new CertificadoEnvio();
$cert->base64Certificado = base64_encode(file_get_contents('certificado.pfx'));
$cert->senha             = 'senha-do-pfx';
$bnfe->Empresa->alterarCertificado($cert);

// Listagem
$empresas = $bnfe->Empresa->buscarTodasEmpresas();
```

---

## Referência de Métodos

### `NotaFiscal` — [src/Methods/NotaFiscal.php](src/Methods/NotaFiscal.php)

| Método                           | Endpoint                        | Payload                         | Retorno                     |
|----------------------------------|---------------------------------|---------------------------------|-----------------------------|
| `enviarNotaFiscal`               | `EnviarNotaFiscal`              | `NotaFiscalEnvio`               | `NotaFiscalRetorno`         |
| `enviarNotaFiscalLote`           | `EnviarNotaFiscalLote`          | `NotaFiscalLoteEnvio`           | `NotaFiscalLoteRetorno`     |
| `enviarConhecimentoTransporte`   | `EnviarConhecimentoTransporte`  | `CTeEnvio`                      | `CTeRetorno`                |
| `enviarDeclaracaoConteudo`       | `EnviarDeclaracaoConteudo`      | `DCeEnvio`                      | `DCeRetorno`                |
| `enviarNotaFiscalServico`        | `EnviarNotaFiscalServico`       | `NotaFiscalServicoEnvio`        | `NotaFiscalServicoRetorno`  |
| `enviarManifestoTransporte`      | `EnviarManifestoTransporte`     | `ManifestoTransporteEnvio`      | `ManifestoTransporteRetorno`|
| `enviarNFEnerCom`                | `EnviarNFEnerCom`               | `NFEnerComEnvio`                | `NFEnerComRetorno`          |
| `enviarNotaFiscalComplementar`   | `EnviarNotaFiscalComplementar`  | `NotaFiscalComplementarEnvio`   | `NotaFiscalRetorno`         |

### `Eventos` — [src/Methods/Eventos.php](src/Methods/Eventos.php)

| Método                           | Endpoint                       | Payload                               | Retorno                    |
|----------------------------------|--------------------------------|---------------------------------------|----------------------------|
| `cancelarNotaFiscal`             | `CancelNF`                     | `CancelarNotaFiscalEnvio`             | `EventoNotaFiscalRetorno`  |
| `enviarCartaCorrecao`            | `EnviarCartaCorrecao`          | `CartaCorrecaoEnvio`                  | `EventoNotaFiscalRetorno`  |
| `inutilizarNumeracao`            | `InutilizarNumeracao`          | `InutilizarNumeracaoEnvio`            | `EventoNotaFiscalRetorno`  |
| `manifestarNotaFiscal`           | `ManifestarNotaFiscal`         | `ManifestarNotaFiscalEnvio`           | `EventoNotaFiscalRetorno`  |
| `encerrarManifestoTransporte`    | `EncerrarManifestoTransporte`  | `EncerrarManifestoTransporteEnvio`    | `EventoNotaFiscalRetorno`  |

### `Consultas` — [src/Methods/Consultas.php](src/Methods/Consultas.php)

| Método                     | Endpoint                   | Payload                       | Retorno                            |
|----------------------------|----------------------------|-------------------------------|------------------------------------|
| `consultarStatusSefaz`     | `ConsultarStatusSefaz`     | `StatusSefazEnvio`            | `StatusSefazRetorno`               |
| `calcularImpostos`         | `CalcularImpostos`         | `Produto[]`                   | `CalculoImpostosRetorno`           |
| `preVisualizarNotaFiscal`  | `PreVisualizarNotaFiscal`  | `PreVisualizarNotaFiscalEnvio`| `PreVisualizarNotaFiscalRetorno`   |
| `buscarNotaFiscalServico`  | `BuscarNotaFiscalServico`  | `BuscarNotaFiscalServicoEnvio`| `NotaFiscalServicoRetorno`         |
| `obterNotasFiscais`        | `ObterNotasFiscais`        | `BuscarNotaFiscalEnvio`       | `BuscarNotaFiscalRetorno`          |
| `consultarCadastroSefaz`   | `ConsultarCadastroSefaz`   | `ConsultarCadastroEnvio`      | `ConsultarCadastroRetorno`         |
| `obterArquivoSped`         | `ObterArquivoSped`         | `string` (código)             | `SpedRetorno`                      |
| `consultarLoteNFe`         | `ConsultarLoteNFe`         | `ConsultarLoteNFeEnvio`       | `NotaFiscalLoteRetorno`            |

### `Arquivos` — [src/Methods/Arquivos.php](src/Methods/Arquivos.php)

| Método                        | Endpoint                   | Payload                     | Retorno                    |
|-------------------------------|----------------------------|-----------------------------|----------------------------|
| `gerarArquivoSintegra`        | `GerarArquivoSintegra`     | `SintegraEnvio`             | `SintegraRetorno`          |
| `gerarArquivoFci`             | `GerarArquivoFci`          | `FciEnvio`                  | `FciRetorno`               |
| `obterArqEnerCom`             | `ObterArquivoNFEnerCom`    | `ArqEnerComEnvio`           | `ArqEnerComRetorno`        |
| `gerarArquivoSped`            | `GerarArquivoSped`         | `SpedEnvio`                 | `SpedRetorno`              |
| `unificarArquivoSped`         | `UnificarArquivoSped`      | `UnificarSpedEnvio`         | `SpedRetorno`              |
| `recriarArquivoSped`          | `RecriarArquivoSped`       | `string` (código)           | `SpedRetorno`              |
| `obterArquivoNotaFiscal`      | `ObterArquivoNotaFiscal`   | `PegarArquivoEnvio`         | `string` (binário)         |
| `obterArquivoEvento`          | `ObterArquivoEvento`       | `PegarArquivoEventoEnvio`   | `string` (binário)         |
| `obterArquivosPorPeriodo`     | `ObterArquivosPorPeriodo`  | `ObterArquivosRangeEnvio`   | `ObterArquivosRangeRetorno`|

### `Empresa` — [src/Methods/Empresa.php](src/Methods/Empresa.php)

| Método                  | Endpoint              | Payload             | Retorno               |
|-------------------------|-----------------------|---------------------|-----------------------|
| `alterarCertificado`    | `AlterarCertificado`  | `CertificadoEnvio`  | `CertificadoRetorno`        |
| `verificarCertificado`  | `VerifyCertificate`   | `CertificadoEnvio`  | `CertificadoRetorno`        |
| `adicionarEmpresa`      | `AdicionarEmpresa`    | `EmpresaEnvio`      | `EmpresaRetorno`            |
| `editarEmpresa`         | `EditarEmpresa`       | `EmpresaEnvio`      | `EmpresaRetorno`            |
| `deletarEmpresa`        | `DeletarEmpresa`      | —                   | `EmpresaRetorno`            |
| `buscarEmpresa`         | `BuscarEmpresa`       | —                   | `EmpresaEnvio`              |
| `buscarTodasEmpresas`   | `BuscarTodasEmpresas` | —                   | `EmpresaEnvio[]`            |
| `gerarLinkAtivacao`     | `GerarLinkAtivacao`   | —                   | `string` (URL Fintely)      |
| `consultarNumeracao`    | `ConsultarNumeracao`  | —                   | `ConsultarNumeracaoRetorno` |
| `atualizarNumeracao`    | `AtualizarNumeracao`  | `Numeracao`         | `AtualizarNumeracaoRetorno` |

---

## Tratamento de Erros

O SDK emite `\Exception` em dois casos:

1. **Falha de comunicação** (timeout, DNS, TLS): `Erro ao efetuar requisição HTTPS com Brasil NFe: ...`
2. **Resposta HTTP fora de 2xx**: `Resposta HTTP inválida (<código>)`

Rejeições da SEFAZ **não** lançam exceção — elas vêm dentro do objeto de retorno. Sempre verifique `returnNF->ok` (e `error` / `avisos` nos retornos que herdam de [`Erros`](src/Retorno/Erros.php)).

```php
try {
    $resp = $bnfe->NotaFiscal->enviarNotaFiscal($nf);

    if (!$resp->returnNF->ok) {
        echo "Rejeitada [{$resp->returnNF->codStatusRespostaSefaz}] "
           . "{$resp->returnNF->dsStatusRespostaSefaz}\n";

        if (!empty($resp->error))  { echo "Erro: {$resp->error}\n"; }
        foreach ($resp->avisos ?? [] as $aviso) {
            echo "Aviso: {$aviso}\n";
        }
        return;
    }

    echo "Autorizada: chave {$resp->returnNF->chaveNf}\n";
} catch (\Throwable $e) {
    error_log("Falha na integração Brasil NFe: " . $e->getMessage());
}
```

---

## Tabelas de Referência

### Modelos de documento

| Código | Documento |
|--------|-----------|
| 55     | NF-e      |
| 57     | CT-e      |
| 58     | MDF-e     |
| 65     | NFC-e     |

### `tipoAmbiente`

| Código | Ambiente     |
|--------|--------------|
| 1      | Produção     |
| 2      | Homologação  |

### `finalidade` (NF-e)

| Código | Finalidade           |
|--------|----------------------|
| 1      | Normal               |
| 3      | Ajuste               |
| 4      | Devolução / Retorno  |

### `indicadorPresenca`

| Código | Descrição                                             |
|--------|-------------------------------------------------------|
| 0      | Não se aplica                                         |
| 1      | Operação presencial                                   |
| 2      | Operação não presencial, Internet                     |
| 3      | Operação não presencial, teleatendimento              |
| 4      | NFC-e com entrega em domicílio                        |
| 5      | Presencial fora do estabelecimento                    |
| 9      | Operação não presencial, outros                       |

### `indicadorIe` (destinatário)

| Código | Situação                                               |
|--------|--------------------------------------------------------|
| 1      | Contribuinte ICMS (IE obrigatória)                     |
| 2      | Contribuinte isento                                    |
| 9      | Não contribuinte                                       |

### `modalidadeFrete`

| Código | Descrição                               |
|--------|-----------------------------------------|
| 0      | Por conta do Remetente (CIF)            |
| 1      | Por conta do Destinatário (FOB)         |
| 2      | Por conta de Terceiros                  |
| 3      | Transporte próprio, conta do Remetente  |
| 4      | Transporte próprio, conta do Destinatário |
| 9      | Sem ocorrência de transporte            |

### `formaPagamento`

| Código | Forma                                     |
|--------|-------------------------------------------|
| 01     | Dinheiro                                  |
| 02     | Cheque                                    |
| 03     | Cartão de Crédito                         |
| 04     | Cartão de Débito                          |
| 05     | Crediário / Private Label                 |
| 10–13  | Vales (Alimentação, Refeição, Presente, Combustível) |
| 14     | Duplicata Mercantil                       |
| 15     | Boleto Bancário                           |
| 16     | Depósito Bancário                         |
| 17     | PIX Dinâmico                              |
| 18     | Transferência / Carteira Digital          |
| 19     | Programa de fidelidade / cashback         |
| 20     | PIX Estático                              |
| 90     | Sem pagamento                             |
| 99     | Outros                                    |

### `tipoManifestacao`

| Código | Evento                     |
|--------|----------------------------|
| 1      | Confirmação da Operação    |
| 2      | Ciência da Operação        |
| 3      | Desconhecimento da Operação|
| 4      | Operação não Realizada     |

### `crt` (Empresa)

| Código | Regime                                    |
|--------|-------------------------------------------|
| 1      | Simples Nacional                          |
| 2      | Simples Nacional — Excesso de sublimite   |
| 3      | Regime Normal                             |

---

## Ambientes

- **Homologação**: envie `tipoAmbiente = 2` em cada requisição. Ideal para testes; nenhuma nota tem validade fiscal.
- **Produção**: `tipoAmbiente = 1`. A partir daqui a nota é real — o usuário e CNPJ precisam estar devidamente autorizados no painel Brasil NFe e com certificado digital A1 válido.

A URL base padrão é `https://api.brasilnfe.com.br/services/` — a mesma para homologação e produção. O ambiente é sempre determinado pelo campo do payload.

---

## Como o SDK serializa o payload

O SDK usa `symfony/serializer` configurado em [`BrasilNFeRequest`](src/BrasilNFeRequest.php):

- Campos em PHP usam `camelCase` (ex.: `chaveNF`, `valorUnitario`).
- Na resposta, o SDK normaliza automaticamente nomes vindos em `PascalCase`, `camelCase` ou `UPPER` para o formato PHP (via `CaseInsensitiveNameConverter`).
- Datas `DateTime` são serializadas no formato `Y-m-d\TH:i:s`.
- Toda requisição envia os headers:
  ```
  Content-Type: application/json
  Accept: application/json
  Token: <seu token>
  UserToken: <user token, se houver>
  X-SDK-Version: 1.2.0
  X-SDK-Language: PHP
  ```
- Timeout padrão: **300s** (configurado em `curl_setopt`).

---

## Utilitário BrasilNFeHelper

A classe [`BrasilNFeHelper`](src/BrasilNFe.php) expõe um método estático para **ratear valores proporcionalmente** entre itens (útil para distribuir frete, desconto ou seguro entre produtos da nota):

```php
use BrasilNFeSdk\BrasilNFeHelper;

BrasilNFeHelper::ratear(
    $nf->produtos,
    50.00,                                // valor total a distribuir (ex.: frete)
    fn($p) => $p->valorFrete ?? 0,        // seletor do campo a atualizar
    fn($p) => $p->valorTotal,             // seletor da proporção (base)
    BrasilNFeHelper::TIPO_SOMAR           // SUBSTITUIR | SOMAR | SUBTRAIR
);
```

---

## Testes

```bash
composer install
vendor/bin/phpunit tests
```

---

## Licença

Distribuído sob a licença **MIT**. Veja [LICENSE](LICENSE) para mais informações.

---

## Suporte

- **Site:** https://www.brasilnfe.com.br
- **E-mail:** contato@brasilnfe.com.br
- **WhatsApp:** [+55 (31) 9 7168-5947](https://wa.me/5531971685947)

Desenvolvido por **BRASIL NFE LTDA** — CNPJ 39.658.743/0001-99.
