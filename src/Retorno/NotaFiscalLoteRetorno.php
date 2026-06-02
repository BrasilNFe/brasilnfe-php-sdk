<?php

namespace BrasilNFeSdk\Retorno;

class NotaFiscalLoteListRetorno
{
    public RetornoInfo $returnNf;
    public ?string $base64Xml = null;
    public ?string $base64File = null;
    public ?string $identificadorInterno = null;
}

class NotaFiscalLoteRetorno extends NewError
{
    /** Código do lote no Brasil NFe (use em /ConsultarLoteNFe). */
    public ?string $codLote = null;

    /**
     * Status do lote.
     * 1 - Aguardando salvar
     * 2 - Aguardando transmissão SEFAZ
     * 3 - Aguardando finalização
     * 4 - Lote finalizado
     * 5 - Lote finalizado com erro
     */
    public ?int $statusLote = null;

    /** Descrição do status do lote. */
    public ?string $dsStatusLote = null;

    /** Quantidade total de notas no lote. */
    public ?int $qtdTotal = null;

    /** Quantidade de notas autorizadas pela SEFAZ. */
    public ?int $qtdEmitida = null;

    /** Quantidade de notas que falharam. */
    public ?int $qtdErro = null;

    /** @var list<NotaFiscalLoteListRetorno>|null */
    public ?array $notas = [];
}
