<?php

namespace BrasilNFeSdk;

use BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio;

class Validador {

    private static array $estados = [
        'RO', 'AC', 'AM', 'RR', 'PA',
        'AP', 'TO', 'MA', 'PI', 'CE',
        'RN', 'PB', 'PE', 'AL', 'SE',
        'BA', 'MG', 'ES', 'RJ', 'SP',
        'PR', 'SC', 'RS', 'MS', 'MT',
        'GO', 'DF', 'EX'
    ];

    public static function validaNotaFiscalEnvio(NotaFiscalEnvio $notaFiscal, ?int $crt = null): string
    {

        if ($crt !== null) {
            if ($crt != 1 && $crt != 2 && $crt != 3) {
                return "O Código do regime tributário informado é inválido.";
            }
        }

        if ($notaFiscal->modeloDocumento != 55 && $notaFiscal->modeloDocumento != 65) {
            return "O Modelo do documento informado é inválido.";
        }

        if ($notaFiscal->indicadorPresenca != 0 && $notaFiscal->indicadorPresenca != 1 && $notaFiscal->indicadorPresenca != 2 &&
            $notaFiscal->indicadorPresenca != 3 && $notaFiscal->indicadorPresenca != 4 && $notaFiscal->indicadorPresenca != 5 &&
            $notaFiscal->indicadorPresenca != 9) {
            return "O Indicador de presença informado é inválido.";
        }

        if ($notaFiscal->tipoAmbiente != 1 && $notaFiscal->tipoAmbiente != 2) {
            return "O Tipo de ambiente informado é inválido.";
        }

        if ($notaFiscal->finalidade != 1 && $notaFiscal->finalidade != 2 && $notaFiscal->finalidade != 3 && $notaFiscal->finalidade != 4) {
            return "A Finalidade da NF informada é inválida.";
        }

        if (empty(trim($notaFiscal->naturezaOperacao ?? ''))) {
            return "A Natureza da operação informada é inválida.";
        }

        if (strlen($notaFiscal->naturezaOperacao) > 60) {
            return "A Natureza da operação deve conter no máximo 60 caracteres.";
        }

        if ($notaFiscal->transporte !== null) {
            if ($notaFiscal->transporte->modalidadeFrete != 0 && $notaFiscal->transporte->modalidadeFrete != 1 && $notaFiscal->transporte->modalidadeFrete != 2 &&
                $notaFiscal->transporte->modalidadeFrete != 3 && $notaFiscal->transporte->modalidadeFrete != 4 && $notaFiscal->transporte->modalidadeFrete != 9) {
                return "A modalidade de frete do transporte é inválida.";
            }

            if (!empty(trim($notaFiscal->Transporte->dsEndereco ?? ''))) {
                if (strlen($notaFiscal->transporte->dsEndereco) > 60) {
                    return "O endereço do transportador deve conter no máximo 60 caracteres.";
                }
            }
        }

        if ($notaFiscal->produtos === null) {
            return "Produtos não informado.";
        }

        if (count($notaFiscal->produtos) == 0) {
            return "Produtos não informado.";
        }

        $hasEntrada = false;
        $hasSaida = false;
        foreach ($notaFiscal->produtos as $prod) {
            $cfopFirstDigit = substr((string)$prod->cfop, 0, 1);
            if ($cfopFirstDigit == '1' || $cfopFirstDigit == '2' || $cfopFirstDigit == '3') {
                $hasEntrada = true;
            }
            if ($cfopFirstDigit == '5' || $cfopFirstDigit == '6' || $cfopFirstDigit == '7') {
                $hasSaida = true;
            }
        }

        if ($hasEntrada && $hasSaida) {
            return "Informado combinação de CFOPs de entrada e saída na NF-e/NFC-e.";
        }

        $firstProd = $notaFiscal->produtos[0];
        $tCfop = substr((string)$firstProd->cfop, 0, 1);
        $tpNf = ($tCfop == '1' || $tCfop == '2' || $tCfop == '3') ? 0 : 1;
        $destinoOperacao = ($tCfop == '1' || $tCfop == '5') ? 1 : (($tCfop == '2' || $tCfop == '6') ? 2 : 3);
        
        foreach ($notaFiscal->produtos as $index => $item) {
            $produto = empty(trim($item->nmProduto ?? '')) ? 'N° ' . ($index + 1) : $item->nmProduto;

            if (empty(trim($item->codProdutoServico ?? ''))) {
                return "O código do produto/serviço " . $produto . " é inválida.";
            }

            if (empty(trim($item->nmProduto ?? ''))) {
                return "A descrição do produto " . $produto . " é inválida.";
            }

            if (strlen($item->nmProduto) > 120) {
                return "A descrição do produto " . $produto . " deve conter no máximo 120 caracteres.";
            }

            if (strlen((string)$item->cfop) != 4) {
                return "O CFOP do produto " . $produto . " deve conter 4 dígitos.";
            }

            $baseCFOP = substr((string)$item->cfop, 0, 1);
            if ($baseCFOP != '1' && $baseCFOP != '2' && $baseCFOP != '3' && $baseCFOP != '5' && $baseCFOP != '6' && $baseCFOP != '7') {
                return "O CFOP do produto " . $produto . " deve começar com 1, 2, 3, 5, 6 ou 7.";
            }

            // Rejeição 725
            $cfopsNfce = [5101, 5102, 5103, 5104, 5115, 5405, 5656, 5667, 5933];
            if ($notaFiscal->modeloDocumento == 65 && !in_array($item->cfop, $cfopsNfce)) {
                return "Rejeição 725: NFC-e com CFOP inválido. Produto: " . $produto;
            }

            if (empty(trim($item->unidadeComercial ?? ''))) {
                return "A Unidade Comercial/Medida do produto " . $produto . " é inválido.";
            }

            if (strlen($item->unidadeComercial) > 6) {
                return "A Comercial/Medida do produto " . $produto . " deve conter no máximo 6 caracteres.";
            }

            if (!empty(trim($item->xPed ?? ''))) {
                if (strlen($item->xPed) > 15) {
                    return "O N° Ped. Cliente (xPed) do produto " . $produto . " deve conter no máximo 15 caracteres.";
                }
            }

            if ($item->nItemPed !== null) {
                if ($item->nItemPed < 0) {
                    return "O N° do item do pedido de compra (nItemPed) do produto " . $produto . " deve ser maior ou igual a 0 (zero).";
                }

                if (strlen((string)$item->nItemPed) > 6) {
                    return "O N° do item do pedido de compra (nItemPed) do produto " . $produto . " deve conter no máximo 6 dígitos.";
                }
            }

            if (empty(trim($item->ncm ?? ''))) {
                return "O NCM do produto " . $produto . " é inválido.";
            }

            if (strlen(preg_replace('/[^0-9]/', '', $item->ncm)) != 8) {
                return "O NCM do produto " . $produto . " deve conter 8 dígitos.";
            }

            if (!empty(trim($item->cest ?? ''))) {
                if (strlen(preg_replace('/[^0-9]/', '', $item->cest)) != 7) {
                    return "O CEST do produto " . $produto . " deve conter 7 dígitos.";
                }
            }

            if (!empty(trim($item->ean ?? ''))) {
                if ($item->ean != "SEM GTIN") {
                    $eanLength = strlen($item->ean);
                    if ($eanLength != 8 && $eanLength != 12 && $eanLength != 13 && $eanLength != 14) {
                        return "O EAN do produto " . $produto . " deve conter 8, 12, 13 ou 14 dígitos.";
                    }
                }
            }

            if ($item->valorDesconto < 0) {
                return "O valor de desconto do produto " . $produto . " é inválido.";
            }

            if ($item->valorTotal < 0) {
                return "O valor total do produto " . $produto . " é inválido.";
            }

            if ($item->valorTotal == 0 && $notaFiscal->finalidade == 1) {
                return "O valor total do produto " . $produto . " é inválido para NF-e com finalidade \"1 - Normal\".";
            }

            if ($item->valorDesconto > $item->valorTotal) {
                return "O valor de desconto do produto " . $produto . " é maior que o valor total.";
            }

            if ($item->valorUnitario < 0) {
                return "O valor unitário do produto " . $produto . " é inválido.";
            }

            if ($item->quantidade <= 0 && $notaFiscal->finalidade != 3) {
                return "A quantidade do produto " . $produto . " é inválida.";
            }

            if ($item->imposto === null) {
                return "Os dados de impostos do produto " . $produto . " não foi informado.";
            }

            if ($item->imposto->icms === null) {
                return "Os dados de impostos ICMS do produto " . $produto . " não foi informado.";
            }

            if ($crt !== null) {
                if ($crt == 1) {
                    $CSOSNs = ['101', '102', '103', '201', '202', '203', '300', '400', '500', '900'];
                    if (!in_array($item->imposto->icms->codSituacaoTributaria, $CSOSNs)) {
                        return "O CSOSN do produto " . $produto . " é inválido para empresa no regime simples nacional.";
                    }
                } else {
                    $CSTs = ['00', '10', '20', '30', '40', '41', '50', '51', '60', '70', '90'];
                    if (!in_array($item->imposto->icms->codSituacaoTributaria, $CSTs)) {
                        return "O CST do ICMS do produto " . $produto . " é inválido para empresa no regime normal.";
                    }
                }
            } else {
                $AllCSTs = ['101', '102', '103', '201', '202', '203', '300', '400', '500', '900',
                            '00', '10', '20', '30', '40', '41', '50', '51', '60', '70', '90'];
                if (!in_array($item->imposto->icms->codSituacaoTributaria, $AllCSTs)) {
                    return "O CST do ICMS ou CSOSN do produto " . $produto . " é inválido.";
                }
            }

            // Rejeição 806
            $allCst_Csosn_Cest = ['201', '202', '203', '500', '10', '30', '60', '70'];
            if (in_array($item->imposto->icms->codSituacaoTributaria, $allCst_Csosn_Cest) && empty(trim($item->CEST ?? ''))) {
                return "Rejeição 806: Operação com ICMS-ST sem informação do CEST. Produto:" . $produto;
            }

            if ($notaFiscal->modeloDocumento == 55) {

                if ($item->imposto->ipi === null) {
                    return "Os dados de impostos IPI do produto " . $produto . " não foi informado.";
                }
    
                $IPIs = ['50', '51', '52', '53', '54', '55', '99', '00', '01', '02',
                        '03', '04', '20', '05', '49'];
                if (!in_array($item->imposto->ipi->codSituacaoTributaria, $IPIs)) {
                    return "O CST do IPI do produto " . $produto . " é inválido.";
                }
            }

            $PIsCOFINs = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '49', '50', '51', '52', '53', '54', '55', '56', '60', '61', '62',
                        '63', '64', '65', '66', '67', '70', '71', '72', '73', '74', '75', '98', '99'];
            $PIsCOFINsEntradas = ['50', '51', '52', '53', '54', '55', '56', '60', '61', '62',
                                '63', '64', '65', '66', '67', '70', '71', '72', '73', '74', '75', '98', '99'];
            $PIsCOFINsSaidas = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '49', '99'];

            if ($item->imposto->pis === null) {
                return "Os dados de impostos PIS do produto " . $produto . " não foi informado.";
            }

            if (!in_array($item->imposto->pis->codSituacaoTributaria, $PIsCOFINs)) {
                return "O CST do PIS do produto " . $produto . " é inválido.";
            }

            if ($tpNf == 1 && !in_array($item->imposto->pis->codSituacaoTributaria, $PIsCOFINsSaidas)) {
                return "O CST do PIS do produto " . $produto . " é inválido para nota fiscal de saída.";
            }

            if ($tpNf == 0 && !in_array($item->imposto->pis->codSituacaoTributaria, $PIsCOFINsEntradas)) {
                return "O CST do PIS do produto " . $produto . " é inválido para nota fiscal de entrada.";
            }

            if ($item->imposto->cofins === null) {
                return "Os dados de impostos COFINS do produto " . $produto . " não foi informado.";
            }

            if (!in_array($item->imposto->cofins->codSituacaoTributaria, $PIsCOFINs)) {
                return "O CST do COFINS do produto " . $produto . " é inválido.";
            }

            if ($tpNf == 1 && !in_array($item->imposto->cofins->codSituacaoTributaria, $PIsCOFINsSaidas)) {
                return "O CST do COFINS do produto " . $produto . " é inválido para nota fiscal de saída.";
            }

            if ($tpNf == 0 && !in_array($item->imposto->cofins->codSituacaoTributaria, $PIsCOFINsEntradas)) {
                return "O CST do COFINS do produto " . $produto . " é inválido para nota fiscal de entrada.";
            }

            if ($item->combustivel !== null) {
                if (!empty(trim($item->combustivel->codProdutoANP ?? ''))) {
                    if (empty(trim($item->combustivel->ufConsumo ?? ''))) {
                        return "A UF de consumo da informação de combustível do produto " . $produto . " é inválida.";
                    }
                }
            }

            // Rejeição 386
            if ($notaFiscal->modeloDocumento == 65 && 
                in_array($item->imposto->icms->codSituacaoTributaria, ['102', '103', '300', '400', '900']) &&
                !in_array($item->cfop, [5101, 5102, 5103, 5104, 5115])) {
                return "Rejeição 386 - O CFOP do produto " . $produto . " não é permitido para o CSOSN informado na emissão de NFC-e.";
            }

            if ($notaFiscal->modeloDocumento == 65 && $item->imposto->icms->codSituacaoTributaria == '500' && 
                !in_array($item->cfop, [5405, 5656, 5667])) {
                return "Rejeição 386 - O CFOP do produto " . $produto . " não é permitido para o CSOSN informado na emissão de NFC-e.";
            }

            $cfopsExcecao = [3201, 3202, 3503, 3553];
            if ($tCfop == '3' && !in_array($item->cfop, $cfopsExcecao)) {
                if ($item->declaracaoImportacao === null) {
                    return "Operação de importação e não foi informado dados da declaração de importação (DI).";
                }

                if ($item->declaracaoImportacao->tipoViaTransporte < 1 || $item->declaracaoImportacao->tipoViaTransporte > 12) {
                    return "O tipo de via de transporte internacional da DI informado é inválido.";
                }

                if ($item->declaracaoImportacao->tipoIntermedio < 1 || $item->declaracaoImportacao->tipoIntermedio > 3) {
                    return "O tipo de intermediação da DI informado é inválido.";
                }
            }
        }

        $cfopDigits = array_unique(array_map(function($prod) {
            return substr((string)$prod->cfop, 0, 1);
        }, $notaFiscal->produtos));

        if (count($cfopDigits) > 1) {
            return "Informado combinação de CFOPs de operação interna/interestadual/exterior na NF-e/NFC-e.";
        }

        if ($tpNf == 1 && $destinoOperacao == 3) {
            if ($notaFiscal->exporta === null) {
                return "Operação para o exterior e não foi informado dados de exportação.";
            }

            if (empty(trim($notaFiscal->Exporta->UFSaidaPais ?? ''))) {
                return "UF de saída do país inválida.";
            }
        }

        if ($notaFiscal->cliente === null && $notaFiscal->modeloDocumento == 55) {
            return "Para nota fiscal modelo 55 (NF-e) é obrigatório informar o cliente.";
        }

        // Rejeição 787
        if ($notaFiscal->cliente === null && $notaFiscal->modeloDocumento == 65 && $notaFiscal->indicadorPresenca == 4) {
            return "Rejeição 787: NFC-e de entrega a domicílio sem a identificação do destinatário.";
        }

        if ($notaFiscal->cliente !== null) {
            $cpfCnpj = preg_replace('/[^0-9]/', '', $notaFiscal->cliente->cpfCnpj ?? '');

            if ($notaFiscal->modeloDocumento == 55) {
                if (empty($cpfCnpj)) {
                    return "CPF/CNPJ do destinatário inválido.";
                }

                if (empty(trim($notaFiscal->cliente->nmCliente ?? ''))) {
                    return "Nome do destinatário não foi informado.";
                }

                if (empty(trim($notaFiscal->cliente->uf ?? ''))) {
                    return "UF - Unidade Federativa (Estado) do destinatário não foi informado.";
                }
            }

            if (!empty($cpfCnpj)) {
                if ($destinoOperacao != 3 && strlen($cpfCnpj) != 11 && strlen($cpfCnpj) != 14) {
                    return "CPF/CNPJ do destinatário inválido.";
                }

                if ($destinoOperacao != 3 && strlen($cpfCnpj) == 11 && !self::isCpf($cpfCnpj)) {
                    return "Rejeição 237: CPF do destinatário inválido.";
                }

                if ($destinoOperacao != 3 && strlen($cpfCnpj) == 14 && !self::isCnpj($cpfCnpj)) {
                    return "Rejeição 208: CNPJ do destinatário inválido.";
                }

                if ($destinoOperacao == 3 && (strlen($cpfCnpj) < 5 || strlen($cpfCnpj) > 20)) {
                    return "Para operações com exterior, ou para comprador estrangeiro, quando informado o código do destinatario, o mesmo deve conter de 5 a 20 caracteres.";
                }
            }

            if (!empty(trim($notaFiscal->cliente->email ?? ''))) {
                if (strlen($notaFiscal->cliente->email) > 60) {
                    return "Quando informado, o e-mail do cliente deve conter no máximo 60 caracteres.";
                }
            }

            $telefone = preg_replace('/[^0-9]/', '', $notaFiscal->cliente->telefone ?? '');
            if (!empty($telefone)) {
                $telefone = ltrim($telefone, '0');
                if (strlen($telefone) < 6 || strlen($telefone) > 14) {
                    return "Quando informado, o número de telefone do cliente deve conter no mínimo 6 dígitos e no máximo 14 dígitos. 0 (Zeros) à esquerda não são significativos.";
                }
            }

            $cep = preg_replace('/[^0-9]/', '', $notaFiscal->cliente->cep ?? '');
            if (!empty($cep)) {
                if (strlen($cep) != 8) {
                    return "O CEP do cliente de conter 8 caracteres.";
                }
            }

            if (!empty(trim($notaFiscal->cliente->nmCliente ?? ''))) {
                if (strlen($notaFiscal->cliente->nmCliente) > 60) {
                    return "O nome do cliente deve conter no máximo 60 caracteres.";
                }
            }

            if (!empty(trim($notaFiscal->cliente->complemento ?? ''))) {
                if (strlen($notaFiscal->cliente->complemento) > 60) {
                    return "O complemento do endereço do cliente deve conter no máximo 60 caracteres.";
                }
            }

            if (!empty(trim($notaFiscal->cliente->uf ?? ''))) {
                if (strlen($notaFiscal->cliente->uf) != 2) {
                    return "A UF do cliente deve conter 2 caracteres.";
                }

                $ufCliente = strtoupper($notaFiscal->cliente->uf);
                if (!in_array($ufCliente, self::$estados)) {
                    return "A UF do cliente informada é inválida.";
                }
            }

            $codMunicipio = preg_replace('/[^0-9]/', '', $notaFiscal->cliente->codMunicipio ?? '');
            if (!empty($codMunicipio)) {
                if (strlen($codMunicipio) != 7) {
                    return "O código do município no endereço do cliente deve conter 7 dígitos.";
                }
            }

            if ($notaFiscal->modeloDocumento == 55 && $notaFiscal->cliente->indicadoIE != 1 && $notaFiscal->cliente->indicadoIE != 2 && $notaFiscal->cliente->indicadoIE != 9) {
                return "O Indicador de IE (Inscrição Estadual) do cliente é inválido.";
            }

            // Rejeição 696
            if ($notaFiscal->modeloDocumento == 55 && $notaFiscal->cliente->indicadoIE == 9 && $destinoOperacao != 3 && !$notaFiscal->consumidorFinal) {
                return "Rejeição 696: Operação com não contribuinte deve indicar operação com consumidor final.";
            }

            // Rejeição 728
            if ($notaFiscal->modeloDocumento == 55 && $notaFiscal->cliente->indicadoIE == 1 && empty(trim($notaFiscal->cliente->ie ?? ''))) {
                return "Rejeição 728: NF-e sem informação da IE do destinatário.";
            }

            // Rejeição 788
            if ($notaFiscal->modeloDocumento == 65 && $notaFiscal->indicadorPresenca == 4 && empty($cep)) {
                return "Rejeição 788 - NFC-e de entrega a domicílio sem o endereço do destinatário.";
            }

            // Rejeição 789
            if ($notaFiscal->modeloDocumento == 65 && $notaFiscal->cliente->indicadoIE != 9 && $notaFiscal->cliente->indicadoIE != 0) {
                return "Rejeição 789: NFC-e para destinatário contribuinte de ICMS.";
            }
        }

        if ($notaFiscal->finalidade == 1) {
            if ($notaFiscal->pagamentos === null) {
                return "Pagamentos não informado.";
            }

            if (count($notaFiscal->pagamentos) == 0) {
                return "Pagamentos não informado.";
            }

            $pagamentos = ['01', '02', '03', '04', '05', '10', '11', '12', '13', '14', '15',
                        '16', '17', '18', '19', '20', '21', '22', '90', '99'];

            foreach ($notaFiscal->pagamentos as $index => $item) {
                $pag = $index + 1;

                if ($item->indicadorPagamento != 0 && $item->indicadorPagamento != 1) {
                    return "O pagamento N° " . $pag . " possui o indicador de pagamento inválido!";
                }

                if (!in_array($item->formaPagamento, $pagamentos)) {
                    return "O pagamento N° " . $pag . " possui a forma de pagamento inválida!";
                }

                if ($item->formaPagamento == "03" || $item->formaPagamento == "04") {
                    if (!empty(trim($item->bandeiraOperadora ?? ''))) {
                        $bandeiras = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '99'];
                        if (!in_array($item->bandeiraOperadora, $bandeiras)) {
                            return "O pagamento N° " . $pag . " possui a bandeira do cartão inválida!";
                        }
                    }
                }

                if ($item->vlPago < 0) {
                    return "O pagamento N° " . $pag . " possui o valor pago menor que zero!";
                }

                if ($item->vlTroco < 0) {
                    return "O pagamento N° " . $pag . " possui o valor do troco menor que zero!";
                }
            }

            // Rejeição 865 (Aqui está validando somente nas NFC-e)
            if ($notaFiscal->modeloDocumento == 65 && !in_array('90', array_map(function($pag) { return $pag->formaPagamento; }, $notaFiscal->pagamentos))) {
                $vlNF = array_reduce($notaFiscal->produtos, function($carry, $prod) {
                    return $carry + $prod->valorTotal + ($prod->valorFrete ?? 0) + ($prod->valorSeguro ?? 0) + ($prod->valorOutrasDespesas ?? 0) - $prod->valorDesconto;
                }, 0);

                $totalPagamentos = array_reduce($notaFiscal->pagamentos, function($carry, $pag) {
                    return $carry + $pag->vlPago;
                }, 0);

                if ($totalPagamentos < $vlNF) {
                    return "Rejeição 865: Total dos pagamentos menor que o total da nota.";
                }

                // Rejeição 866
                $totalTroco = array_reduce($notaFiscal->pagamentos, function($carry, $pag) {
                    return $carry + $pag->vlTroco;
                }, 0);

                if ($totalPagamentos > $vlNF && $totalTroco <= 0) {
                    return "Rejeição 866: Ausência de troco quando o valor dos pagamentos informados for maior que o total da nota.";
                }
            }
        }

        return "";
    }

    private static function onlyNumbers(string $value): string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }

    private static function isCpf(string $cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        
        return true;
    }

    private static function isCnpj(string $cnpj): bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
        
        if (strlen($cnpj) != 14 || preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        
        $resto = $soma % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;
        
        if ($cnpj[12] != $digito1) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        
        $resto = $soma % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;
        
        return $cnpj[13] == $digito2;
    }

    private static function isEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}