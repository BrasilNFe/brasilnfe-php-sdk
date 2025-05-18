<?php

namespace BrasilNFeSdk\Retorno;

use BrasilNFeSdk\Retorno\Erros;
use DateTime;

class BuscarNotaFiscalRetorno extends Erros
{
    /**
     * @var BuscarNotaFiscalRetornoInfo[]
     */
    public ?array $notas = [];
}

class BuscarNotaFiscalRetornoInfo
{
    /** @var string|null */
    public ?string $chave = null;
    
    /** @var string|null */
    public ?string $identificadorInterno = null;
    
    /** @var string|null */
    public ?string $codLote = null;
    
    /** @var int|null */
    public ?int $numero = null;

    /**
     * Modelo do documento fiscal
     * 10 - Nota Fiscal de Serviço (NFS-e)
     * 55 - Nota Fiscal Eletrônica (NF-e)
     * 65 - Nota Fiscal de Consumidor (NFC-e)
     * 57 - Conhecimento de Transporte Eletrônico (CT-e)
     * 58 - Manifesto Eletrônico de Documentos Fiscais (MDF-e)
     * 59 - Cupom Fiscal Eletrônico SAT (CFe SAT)
     * @var int|null
     */
    public ?int $modeloDocumento = null;
    
    /** @var float|null */
    public ?float $valor = null;
    
    /** @var float|null */
    public ?float $valorIcms = null;
    
    /** @var string|null */
    public ?string $cnpjEmissor = null;
    
    /** @var string|null */
    public ?string $nomeEmissor = null;
    
    /** @var string|null */
    public ?string $ieEmissor = null;

    /** @var string|null */
    public ?string $cnpjDestinatario = null;

    /** @var string|null */
    public ?string $nomeDestinatario = null;

    /** @var string|null */
    public ?string $numeroProtocolo = null;
    
    /** @var string|null */
    public ?string $cfops = null;
    
    /** @var string|null */
    public ?string $digestValue = null;

    /**
     * Status da nota fiscal:
     * 1 - Autorizado o uso
     * 2 - Documento Cancelado
     * 3 - Uso denegado
     * @var int
     */
    public int $status = 1;
    
    /** @var DateTime|null */
    public ?DateTime $dtRecebimento = null;
    
    /** @var DateTime|null */
    public ?DateTime $dtEmissao = null;
}