<?php

namespace BrasilNFeSdk\Envio\NFe;

use BrasilNFeSdk\Envio\Outros\Pessoa;

class Cliente
{
    /**
     * @var string
     * @para 1 - Contribuinte ICMS (informar a IE do destinatário)
     * @para 2 - Contribuinte isento de Inscrição no cadastro de Contribuintes do ICMS
     * @para 9 - Não Contribuinte, que pode ou não possuir Inscrição Estadual no Cadastro de Contribuintes do ICMS
     */
    public $cpfCnpj;
    public $nmCliente;
    public $cep;
    public $logradouro;
    public $complemento;
    public $numero;
    public $bairro;
    public $codMunicipio;
    public $nmMunicipio;
    public $uf;
    public $codPais = 1058;
    public $nmPais = "BRASIL";
    public $telefone;
    public $email;
    
    /**
     * @var int
     * @para 1 - Contribuinte ICMS (informar a IE do destinatário)
     * @para 2 - Contribuinte isento de Inscrição no cadastro de Contribuintes do ICMS
     * @para 9 - Não Contribuinte, que pode ou não possuir Inscrição Estadual no Cadastro de Contribuintes do ICMS
     */
    public $indicadoIE = 9;
    
    public $ie;
    public $isuf;
}

class ClienteV2 extends Pessoa
{
    public $cpfCnpj;
    public $nmCliente;
    
    /**
     * @var int
     * @para 1 - Contribuinte ICMS (informar a IE do destinatário)
     * @para 2 - Contribuinte isento de Inscrição no cadastro de Contribuintes do ICMS
     * @para 9 - Não Contribuinte, que pode ou não possuir Inscrição Estadual no Cadastro de Contribuintes do ICMS
     */
    public $indicadorIe;
    
    public $ie;
    public $isUf;
}

class Entrega extends Pessoa
{
    public $cpfCnpj;
    public $nome;
    public $ie;
}

class Produto
{

    public function __construct() {
        $this->imposto = new Imposto();
    }

    /**
     * @var string Descrição do Produto
     */
    public $nmProduto;

    /**
     * @var string Código do produto ou serviço
     */
    public $codProdutoServico;

    /**
     * @var string GTIN (Global Trade Item Number) do produto, antigo código EAN ou código de barras (Noramalmente sem GTIN)
     */
    public $ean;

    /**
     * @var string Código NCM (8 posições). Em caso de item de serviço ou item que não tenham produto (Ex. transferência de
     * crédito, crédito do ativo imobilizado, etc.), informar o código 00 (zeros) (v2.0)
     */
    public $ncm;

    /**
     * @var string Código CEST
     */
    public $cest;

    /**
     * @var float Quantidade Comercial  do produto, alterado para aceitar de 0 a 4 casas decimais e 11 inteiros.
     */
    public $quantidade;

    /**
     * @var string Unidade comercial (Unidade de Medida)
     */
    public $unidadeComercial;

    /**
     * @var string Unidade comercial (Unidade de Medida Tributável)
     */
    public $unidadeComercialTributavel;

    /**
     * @var float Valor do Desconto
     */
    public $valorDesconto;

    /**
     * @var float Valor Unitario
     */
    public $valorUnitario;

    /**
     * @var float Valor Total Bruto
     */
    public $valorTotal;

    /**
     * @var float|null Valor Seguro
     */
    public $valorSeguro;

    /**
     * @var float|null Valor Frete
     */
    public $valorFrete;

    /**
     * @var float|null Valor Outras Despesas
     */
    public $valorOutrasDespesas;

    /**
     * @var int Código Fiscal de Operações e Prestações
     */
    public $cfop;

    /**
     * @var int|null Número do item do Pedido de Compra
     */
    public $nItemPed;

    /**
     * @var string Número do Pedido de Compra
     */
    public $xPed;

    /**
     * @var string Número de controle da FCI - Ficha de Conteúdo de Importação
     */
    public $nfci;
    
    /**
     * @var string Código de Beneficio Fiscal na UF
     */
    public $cBenef;

    /**
     * @var string Informaçoes adicional
     */
    public $informacaoAdicional;

    /**
     * @var int
     * @para 0 - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8
     * @para 1 - Estrangeira - Importação direta, exceto a indicada no código 6
     * @para 2 - Estrangeira - Adquirida no mercado interno, exceto a indicada no código 7
     * @para 3 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 40% e inferior ou igual a 70%
     * @para 4 - Nacional, cuja produção tenha sido feita em conformidade com os processos produtivos básicos de que tratam as legislações citadas nos Ajustes
     * @para 5 - Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou igual a 40%
     * @para 6 - Estrangeira - Importação direta, sem similar nacional, constante em lista da CAMEX e gás natural
     * @para 7 - Estrangeira - Adquirida no mercado interno, sem similar nacional, constante lista CAMEX e gás natural
     * @para 8 - Nacional, mercadoria ou bem com Conteúdo de Importação superior a 70%
     */
    public $origemProduto;
    
    /**
     * @var string Código do grupo tributário cadastrado no Painel, para automação de impostos
     */
    public $codTributacao;

    /**
     * @var Imposto ICMS, IPI, PIS, COFINS
     */
    public Imposto $imposto;
    
    public ?Combustivel $combustivel = null;
    
    public ?DeclaracaoImportacao $declaracaoImportacao = null;
}

class Imposto
{

    public function __construct() {
        $this->icms = new ICMS();
        $this->pis = new PIS();
        $this->cofins = new COFINS();
    }

    public ICMS $icms;
    public ?IPI $ipi = null;
    public PIS $pis;
    public COFINS $cofins;
    public ?Importacao $importacao = null;
}

class ICMS
{
    /**
     * @var string Código da Situação Tributária (CST)
     */
    public $codSituacaoTributaria;

    /**
     * @var float|null Alíquota ICMS - Obrigatório para situação tributária nº 101 e 201
     */
    public $aliquotaICMS;

    /**
     * @var float|null Alíquota ICMS ST - Obrigatório para situação tributária nº 101 e 201
     */
    public $aliquotaICMSST;

    /**
     * @var float|null Alíquota - Obrigatório para situação tributária nº 201, 202 e 203
     */
    public $aliquotaMVA;

    /**
     * @var float|null Alíquota aplicável de cálculo de crédito - Obrigatório para situação tributária nº 101 e 201
     */
    public $aliquotaCredito;

    /**
     * @var float|null Redução ICMS
     */
    public $redICMS;

    /**
     * @var float|null Redução ICMS ST
     */
    public $redICMSST;
    
    /**
     * @var float|null Base de Cálculo (Quando não informado, é o valor dos produtos)
     */
    public $baseCalculo;
    
    /**
     * @var float|null Valor do Icms (Calculado Automaticamente quando não informado)
     */
    public $valorIcms;

    /**
     * @var int|null
     * @para 1 - Táxi;
     * @para 2 - Deficiente Físico;
     * @para 3 - Produtor Agropecuário;
     * @para 4 - Frotista / Locadora;
     * @para 5 - Diplomático / Consular;
     * @para 6 - Utilitários e Motocicletas da Amazônia Ocidental e Áreas de Livre Comércio (Resolução 714/88 e 790/94 – CONTRAN e suas alterações);
     * @para 7 - SUFRAMA
     * @para 8 - Venda a Orgãos Publicos
     * @para 9 - Outros. (v2.0)
     * @para 10 - Deficiente Condutor (Convênio ICMS 38/12). (v3.1)
     * @para 11 - Deficiente não Condutor (Convênio ICMS 38/12). (v3.1)
     * @para 16 - Olimpíadas Rio 2016
     */
    public $motivoDesoneracaoIcms;
    
    public $valorDesoneracaoIcms;
    
    /**
     * @var float|null Percentual de diferimento (Utilizado somente no CST 51)
     */
    public $aliquotaDiferimento;
}

class IPI
{
    /**
     * @var string Código de Enquadramento Legal do IPI
     */
    public $codEnquadramento;

    /**
     * @var string Código da Situação Tributária do IPI
     */
    public $codSituacaoTributaria;

    /**
     * @var float Aliquota do IPI
     */
    public $aliquota;

    /**
     * @var float Valor do IPI devolvido
     */
    public $valorIpiDevolvido;

    /**
     * @var float Percentual da mercadoria devolvida
     */
    public $percentualMercadoriaDevolvida;
}

class PIS
{
    /**
     * @var string Código da Situação Tributária do PIS
     */
    public $codSituacaoTributaria;

    /**
     * @var float Aliquota do PIS
     */
    public $aliquota;

    /**
     * @var float|null Base de Cálculo (Quando não informado, é o valor dos produtos)
     */
    public $baseCalculo;
}

class COFINS
{
    /**
     * @var string Código da Situação Tributária do COFINS
     */
    public $codSituacaoTributaria;

    /**
     * @var float Aliquota do COFINS
     */
    public $aliquota;

    /**
     * @var float|null Base de Cálculo (Quando não informado, é o valor dos produtos)
     */
    public $baseCalculo;
}

class Importacao
{
    public $baseCalculo;
    public $despesasAduaneiras;
    public $valor;
    public $valorIOF;
}

class Pagamento
{
    /**
     * @var int 0 - A vista, 1 - Prazo
     */
    public $indicadorPagamento;

    public $desconto;
    public $descricao;

    /**
     * @var string
     * @para 01 - Dinheiro
     * @para 02 - Cheque
     * @para 03 - Cartão de Crédito
     * @para 04 - Cartão de Débito
     * @para 05 - Cartão da Loja (Private Label), Crediário Digital, Outros Crediários
     * @para 10 - Vale Alimentação
     * @para 11 - Vale Refeição
     * @para 12 - Vale Presente
     * @para 13 - Vale Combustível
     * @para 14 - Duplicata Mercantil
     * @para 15 - Boleto Bancário
     * @para 16 - Depósito Bancário
     * @para 17 - Pagamento Instantâneo (PIX) - Dinâmico
     * @para 18 - Transferencia Bancária, Carteira Digital
     * @para 19 - Programa de fidelidade, cashback, crédito virtual
     * @para 20 - Pagamento Instantâneo (PIX) - Estático
     * @para 21 - Crédito em Loja de Devolução
     * @para 22 - Pagamento Eletrônico não Informado - falha de hardware do sistema emissor
     * @para 90 - Sem pagamento
     * @para 99 - Outros
     */
    public $formaPagamento;

    public $vlPago;
    public $vlTroco;

    /**
     * @var bool Pagamento integrado com automação?
     */
    public $tipoIntegracao = false;

    public $cnpjCredenciadora;

    /**
     * @var string
     * @para 01 - Visa
     * @para 02 - Mastercard
     * @para 03 - American Express
     * @para 04 - Sorocred
     * @para 05 - Diners Club
     * @para 06 - Elo
     * @para 07 - Hipercard
     * @para 08 - Aura
     * @para 09 - Cabal
     * @para 99 - Outros
     */
    public $bandeiraOperadora;

    public $numeroAutorizacao;
}

class Cobranca
{
    public Fatura $fatura;
    
    /**
     * @var Parcela[]
     */
    public $parcelas;
}

class Fatura
{
    public $numero;
    public $valor;
    public $desconto;
    public $valorLiquido;
}

class Parcela
{
    public $vencimento;
    public $valor;
}

class Transporte
{
    /**
     * @var int
     * @para 0 - Contratação do Frete por conta do Remetente (CIF)
     * @para 1 - Contratação do Frete por conta do Destinatário (FOB)
     * @para 2 - Contratação do Frete por conta de Terceiros
     * @para 3 - Transporte Próprio por conta do Remetente
     * @para 4 - Transporte Próprio por conta do Destinatário
     * @para 9 - Sem Ocorrência de Transporte
     */
    public $modalidadeFrete;

    public $nmTransportador;
    public $cnpj;
    public $nmMunicipio;
    public $dsEndereco;
    public $ie;
    public $uf;
    public $vagao;
    public $balsa;
    public $veiculo;
    
    /**
     * @var Reboque[]
     */
    public $reboque;
    
    public $volume;
    
    /**
     * @var Volume[]
     */
    public $volumes;
}

class Veiculo
{
    public $placa;
    public $uf;
    public $rntc;
}

class Volume
{
    public $numero;
    public $quantidadeVolume;
    public $especie;
    public $marca;
    public $pesoBruto;
    public $pesoLiquido;
    
    /**
     * @var string[]
     */
    public $lacres;
}

class Reboque
{
    public $placa;
    public $uf;
    public $rntc;
}

class Combustivel
{
    public $codProdutoANP;
    public $descricaoProdutoANP;
    public $ufConsumo;
}

class Exporta
{
    /**
     * @var string Descrição do local de despacho
     */
    public $localDespacho;

    /**
     * @var string Sigla da UF de Embarque ou de transposição de fronteira
     */
    public $ufSaidaPais;

    /**
     * @var string Descrição do Local de Embarque ou de transposição de fronteira
     */
    public $localEmbarqueTransp;
}

class DeclaracaoImportacao
{
    /**
     * @var string Número do Documento de Importação (DI, DSI, DIRE, ...)
     */
    public $numero;

    /**
     * @var DateTime Data de Registro do documento de importação
     */
    public $dataRegistro;

    /**
     * @var string Local de Desembaraço Aduaneiro
     */
    public $localDesenbaraco;

    /**
     * @var string Sigla da UF onde ocorreu o Desembaraço Aduaneiro
     */
    public $ufDesenbaraco;

    /**
     * @var DateTime Data do Desembaraço Aduaneiro
     */
    public $dataDesenbaraco;

    /**
     * @var int Via de transporte internacional informada na Declaração de Importação (DI)
     * @para 1 - Marítima
     * @para 2 - Fluvial
     * @para 3 - Lacustre
     * @para 4 - Aérea
     * @para 5 - Postal
     * @para 6 - Ferroviária
     * @para 7 - Rodoviária
     * @para 8 - Conduto / Rede Transmissão
     * @para 9 - Meios Próprios
     * @para 10 - Entrada / Saída ficta
     * @para 11 - Courier
     * @para 12 - Handcarry
     */
    public $tipoViaTransporte;

    /**
     * @var float|null Valor da AFRMM - Adicional ao Frete para Renovação da Marinha Mercante
     */
    public $valorAFRMM;

    /**
     * @var int Forma de importação quanto a intermediação
     * @para 1 - Importação por conta própria
     * @para 2 - Importação por conta e ordem
     * @para 3 - Importação por encomenda
     */
    public $tipoIntermedio;

    /**
     * @var string CNPJ do adquirente ou do encomendante
     */
    public $cnpj;

    /**
     * @var string Sigla da UF do adquirente ou do encomendante
     */
    public $uf;

    /**
     * @var string Código do Exportador
     */
    public $codExportador;
    
    /**
     * @var string Código do Fabricante Extrangeiro
     */
    public $codFabricante;
}

class NotaFiscalEnvio
{
    public function __construct()
    {
        $this->cliente = new Cliente();
        $this->produtos = [];
        $this->pagamentos = [];
        $this->transporte = new Transporte();
        $this->transporte->modalidadeFrete = 9;
    }

    /**
     * @var int|null Série da nota Fiscal
     */
    public $serie;

    /**
     * @var int|null Número da nota fiscal
     */
    public $numero;

    /**
     * @var int|null Lote da Nota Fiscal
     */
    public $lote;

    /**
     * @var DateTime|null Data e Hora da saída ou de entrada da produto/serviço
     */
    public $dataEntradaSaida;

    /**
     * @var DateTime|null Data e Hora da saída ou de entrada da produto/serviço (Envia a data atual caso não informada)
     */
    public $dataEmissao;

    /**
     * @var string B03 - Código numérico que compõe a Chave de Acesso. Número aleatório gerado pelo emitente para cada NF-e.
     */
    public $codigo;

    /**
     * @var string Utilizar quando o tipo de emissão for diferente normal
     */
    public $justificativa;

    /**
     * @var string[] Notas fiscal de Referência
     */
    public $nfReferencia;

    /**
     * @var int Indicador de presença do comprador no estabelecimento comercial no momento da operação
     * @para 0 - Não se aplica
     * @para 1 - Operação presencial;
     * @para 2 - Operação não presencial, pela Internet;
     * @para 3 - Operação não presencial, Teleatendimento;
     * @para 4 - NFC-e em operação com entrega a domicílio;
     * @para 5 - Presencial fora do estabelecimento;
     * @para 9 - Operação não presencial, outros.
     */
    public $indicadorPresenca;

    /**
     * @var bool Indicador de intermediador/marketplace
     * @para falso - Operação sem intermediador
     * @para verdadeiro - Operação em site ou plataforma de terceiros;
     */
    public $indicadorIntermediador;

    /**
     * @var bool Indica operação com Consumidor final (NFCe de ser 1 Validar!)
     * @para Falso - Normal;
     * @para Verdadeiro - Consumidor final;
     */
    public $consumidorFinal;

    /**
     * @var bool Indica operação com Consumidor final (NFCe de ser 1 Validar!)
     * @para Falso - Normal;
     * @para Verdadeiro - Consumidor final;
     */
    public $calcularIBPT = true;

    /**
     * @var string Descrição da Natureza da Operação
     */
    public string $naturezaOperacao;

    /**
     * @var int Código do modelo do Documento Fiscal (Padrão 55)
     * @para 55 - NF-e
     * @para 65 - NFC-e
     */
    public $modeloDocumento;

    /**
     * @var int Finalidade da emissão da NF-e
     * @para 1 - Normal
     * @para 3 - Ajuste
     * @para 4 - Devolução/Retorno
     */
    public $finalidade;

    /**
     * @var int Identificação do Ambiente
     * @para 1 - Produção
     * @para 2 - Homologação
     */
    public $tipoAmbiente;

    public $observacao;
    public $observacaoFisco;
    public $identificadorInterno;
    public $enviarEmail;
    public Cliente $cliente;
    
    /**
     * @var Produto[]
     */
    public $produtos;
    
    /**
     * @var Pagamento[]
     */
    public $pagamentos;
    
    public Cobranca $cobranca;
    public Transporte $transporte;
    public Exporta $exporta;
    public Entrega $entrega;
}

class NotaFiscalEnvioV2
{
    public function __construct()
    {
        $this->nfInfos = [];
    }

    /**
     * @var int Identificação do Ambiente
     * @para 1 - Produção
     * @para 2 - Homologação
     */
    public $tipoAmbiente;

    /**
     * @var int Código do modelo do Documento Fiscal (Padrão 55)
     * @para 55 - NF-e
     * @para 65 - NFC-e
     */
    public $modeloDocumento = 55;

    /**
     * @var int|null Lote da Nota Fiscal
     */
    public $lote;
    
    /**
     * @var NFInfo[]
     */
    public $nfInfos;
}

class NFInfo
{
    public function __construct()
    {
        $this->produtos = [];
        $this->pagamentos = [];
        $this->transporte = new Transporte();
        $this->transporte->modalidadeFrete = 9;
    }

    /**
     * @var int|null Série da nota Fiscal
     */
    public $serie;

    /**
     * @var int|null Número da nota fiscal
     */
    public $numero;

    /**
     * @var DateTime|null Data e Hora da saída ou de entrada da produto/serviço
     */
    public $dataEntradaSaida;

    /**
     * @var DateTime|null Data e Hora da saída ou de entrada da produto/serviço (Envia a data atual caso não informada)
     */
    public $dataEmissao;

    /**
     * @var string B03 - Código numérico que compõe a Chave de Acesso. Número aleatório gerado pelo emitente para cada NF-e.
     */
    public $codigo;

    /**
     * @var string Utilizar quando o tipo de emissão for diferente normal
     */
    public $justificativa;

    /**
     * @var string[] Notas fiscal de Referência
     */
    public $nfReferencia;

    /**
     * @var int Indicador de presença do comprador no estabelecimento comercial no momento da operação
     * @para 0 - Não se aplica
     * @para 1 - Operação presencial;
     * @para 2 - Operação não presencial, pela Internet;
     * @para 3 - Operação não presencial, Teleatendimento;
     * @para 4 - NFC-e em operação com entrega a domicílio;
     * @para 5 - Presencial fora do estabelecimento;
     * @para 9 - Operação não presencial, outros.
     */
    public $indicadorPresenca;

    /**
     * @var bool Indicador de intermediador/marketplace
     * @para falso - Operação sem intermediador
     * @para verdadeiro - Operação em site ou plataforma de terceiros;
     */
    public $indicadorIntermediador;

    /**
     * @var bool Indica operação com Consumidor final (NFCe de ser 1 Validar!)
     * @para Falso - Normal;
     * @para Verdadeiro - Consumidor final;
     */
    public $consumidorFinal;

    /**
     * @var bool Indica operação com Consumidor final (NFCe de ser 1 Validar!)
     * @para Falso - Normal;
     * @para Verdadeiro - Consumidor final;
     */
    public $calcularIBPT = true;

    /**
     * @var string Descrição da Natureza da Operação
     */
    public $naturezaOperacao;

    /**
     * @var int Finalidade da emissão da NF-e
     * @para 1 - NFe normal
     * @para 3 - NFe de ajuste
     * @para 4 - Devolução/Retorno
     */
    public $finalidade;

    public $observacao;
    public $observacaoFisco;
    public $identificadorInterno;
    public $enviarEmail;
    public ClienteV2 $cliente;
    
    /**
     * @var Produto[]
     */
    public $produtos;
    
    /**
     * @var Pagamento[]
     */
    public $pagamentos;
    
    public Cobranca $cobranca;
    public Transporte $transporte;
    public Exporta $exporta;
    public Entrega $entrega;
}