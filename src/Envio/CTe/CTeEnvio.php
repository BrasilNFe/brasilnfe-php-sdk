<?php

namespace BrasilNFeSdk\Envio\CTe;

use BrasilNFeSdk\Envio\Outros\Pessoa;

class Participante extends Pessoa
{
    public ?string $cpfCnpj = null;
    public ?string $nome = null;
    public ?string $nomeFantasia = null;
    public ?string $ie = null;
}

class Tomador extends Participante
{
    /**
     * Indicador de IE:
     * 1 - Contribuinte do ICMS
     * 2 - Contribuinte isento de inscrição
     * 9 - Não contribuinte
     */
    public int $indicadorIe = 0;

    /**
     * Tipo do participante do CT-e:
     * 0 - Remetente
     * 1 - Expedidor
     * 2 - Recebedor
     * 3 - Destinatário
     * 4 - Outros (Informar dados Tomador)
     */
    public int $tipoTomador = 0;
}

class Componente
{
    public ?string $nome = null;
    public float $valor = 0.0;
}

class Servico
{
    public function __construct()
    {
        $this->componentes = [];
    }

    /**
     * Tipo do Serviço:
     * 0 - Normal, 1 - Subcontratação, 2 - Redespacho, 3 - Redespacho Intermediário,
     * 4 - Serviço Vinculado ao Multimodal, 6 - Transporte de Pessoas,
     * 7 - Transporte de Valores, 8 - Excesso de Bagagem
     */
    public int $tipo = 0;

    public int $codMunicipioInicio = 0;
    public ?string $municipioInicio = null;
    public int $codMunicipioFim = 0;
    public ?string $municipioFim = null;
    public float $valorPrestacao = 0.0;
    public float $valorReceber = 0.0;

    /** @var Componente[] */
    public array $componentes = [];
}

class Documento
{
    public ?string $chave = null;
    public ?string $pIN = null;
}

class DetalheCarga
{
    /**
     * Código da Unidade de Medida:
     * 0 - M3, 1 - KG, 2 - TON, 3 - UNIDADE, 4 - LITROS, 5 - MMBTU
     */
    public int $codUnidadeMedida = 0;
    public float $quantidade = 0.0;
    public ?string $tipoMedida = null;
}

class Carga
{
    public function __construct()
    {
        $this->detalhes = [];
        $this->documentos = [];
    }

    public float $valorTotal = 0.0;
    public ?string $produtoPredominante = null;

    /** @var DetalheCarga[] */
    public array $detalhes = [];

    /** @var Documento[] */
    public array $documentos = [];
}

class ICMS
{
    public ?string $cST = null;
    public float $baseCalculo = 0.0;
    public float $aliquota = 0.0;
    public float $valor = 0.0;
    public ?float $percentualReducaoBaseCalculo = null;
    public ?float $aliquotaOutraUF = null;
    public ?float $valorICMSOutraUF = null;
}

class Difal
{
    public float $baseCalculoUfDestino = 0.0;
    public float $percentualFCPUfDestino = 0.0;
    public float $aliquotaICMSUfDestino = 0.0;
    public float $aliquotaInterestadual = 0.0;
    public float $percentualPartilhaICMS = 0.0;
    public float $valorFCPUfDestino = 0.0;
    public float $valorICMSUfDestino = 0.0;
    public float $valorICMSUfInicio = 0.0;
}

class TributoFederal
{
    public ?float $valorPis = null;
    public ?float $valorCofins = null;
    public ?float $valorIr = null;
    public ?float $valorInss = null;
    public ?float $valorCsll = null;
}

class Imposto
{
    public ?ICMS $iCMS = null;
    public ?float $valorTotalTributos = null;
    public ?string $informacoesAdicionaisFisco = null;
    public ?Difal $difal = null;
    public ?TributoFederal $tributosFederal = null;
}

class Proprietario
{
    public ?string $cpfCnpj = null;
    public ?string $rNTRC = null;
    public ?string $tAF = null;
    public ?string $nroRegEstadual = null;
    public ?string $nome = null;
    public ?string $ie = null;
    public ?string $uf = null;

    /**
     * Tipo do proprietário:
     * 0 - TAC Agregado, 1 - TAC Independente, 2 - Outros
     */
    public int $tipoProprietario = 0;
}

class Veiculo
{
    public ?string $codigoInterno = null;
    public ?string $renavam = null;
    public ?string $placa = null;
    public ?int $tara = null;
    public ?int $capacidadeKG = null;
    public ?int $capacidadeM3 = null;

    /**
     * Tipo de propriedade:
     * true - Terceiros, false - Proprio
     */
    public ?bool $tipoPropriedade = null;

    /** Tipo: 0 - Tração, 1 - Reboque */
    public ?int $tipoVeiculo = null;

    /** Tipo de rodado: 0-Não aplicavel, 1-Truck, 2-Toco, 3-Cavalo Mecânico, 4-Van, 5-Utilitário, 6-Outros */
    public ?int $tipoRodado = null;

    /** Tipo de carroceria: 0-Não aplicavel, 1-Aberta, 2-Fechada, 3-Graneleira, 4-Porta Container, 5-Sider */
    public ?int $tipoCarroceria = null;

    public ?string $ufPlaca = null;
    public ?Proprietario $proprietario = null;
}

class Motorista
{
    public ?string $nome = null;
    public ?string $cpf = null;
}

class ValePedagio
{
    public ?string $numeroComprovante = null;
    public ?string $cnpjFornecedor = null;
    public ?string $cnpjPagador = null;
    public float $valor = 0.0;
}

class EmissorOCC
{
    public ?string $cnpj = null;
    public ?string $ie = null;
    public ?string $codigoInternoOCC = null;
    public ?string $uf = null;
    public ?string $telefone = null;
}

class OCC
{
    public ?string $serie = null;
    public int $numero = 0;
    public ?\DateTime $dtEmissaoColeta = null;
    public ?EmissorOCC $emissor = null;
}

class Rodoviario
{
    public function __construct()
    {
        $this->oCCs = [];
    }

    /** @var OCC[] */
    public array $oCCs = [];
}

class ModalCTe
{
    /**
     * Modal do CT-e:
     * 1 - Rodoviário, 2 - Aéreo, 3 - Aquaviário, 4 - Ferroviário, 5 - Dutoviário, 6 - Multimodal
     */
    public int $tipo = 1;

    public ?Rodoviario $rodoviario = null;
}

class CTeEnvio
{
    public ?int $codigo = null;
    public ?int $lote = null;
    public ?int $serie = null;
    public ?int $numero = null;
    public ?string $identificadorInterno = null;

    /** 57 - CT-e | 67 - CT-e OS */
    public int $modeloDocumento = 57;

    /** 1 - Produção, 2 - Homologação */
    public int $tipoAmbiente = 2;

    /**
     * 0 - CT-e Normal
     * 1 - CT-e de Complemento de Valores
     * 2 - CT-e de Anulação
     * 3 - CT-e Substituto
     */
    public int $tipoCte = 0;

    public bool $retira = false;
    public ?\DateTime $dtEmissao = null;
    public int $cfop = 0;
    public ?string $naturezaOperacao = null;
    public ?string $observacao = null;

    public ?ModalCTe $modal = null;
    public ?Carga $carga = null;
    public ?Imposto $imposto = null;
    public ?Servico $servico = null;
    public ?Tomador $tomador = null;
    public ?Participante $destinatario = null;
    public ?Participante $remetente = null;
    public ?Participante $expedidor = null;
}
