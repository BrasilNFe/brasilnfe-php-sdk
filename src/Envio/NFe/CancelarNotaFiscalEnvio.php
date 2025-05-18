<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Class CancelarNotaFiscalEnvio
 */
class CancelarNotaFiscalEnvio
{
    /**
     * Chave da NF-e, NFC-e, MDF-e ou CFe-SAT
     */
    public ?string $chaveNF = null;

    /**
     * Número do protocolo da NF-e ou NFC-e (Obrigatório caso a nota foi emitida por outro sistema)
     */
    public ?string $numeroProtocolo = null;

    /**
     * Motivo do cancelamento do documento fiscal
     */
    public ?string $justificativa = null;

    /**
     * Ambiente de emissão da NFS-e (Padrão 1)
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbienteNFSe = 1;

    /**
     * Data do evento de cancelamento da NF-e ou NFC-e (Caso não for enviado é considerada a data e hora atual)
     */
    public ?\DateTime $dataEvento = null;

    /**
     * Número da NFS-e a ser cancelada
     */
    public ?string $numeroNFSe = null;

    /**
     * Código do motivo de cancelamento da NFS-e (Padrão 1)
     * 1 - Erro na emissão
     * 2 - Serviço não prestado
     * 3 - Duplicidade da nota
     * 9 - Outros
     */
    public int $codCancelamentoNFSe = 1;

    /**
     * Tipo do documento fiscal (Padrão 0 - NF-e, NFC-e, MDF-e, CFe-SAT)
     * 0 - NF-e, NFC-e, MDF-e, CFe-SAT
     * 1 - NFS-e
     */
    public int $tipoDocumento = 0;

    /**
     * Número sequencial do evento
     */
    public ?int $numeroSequencial = null;
}