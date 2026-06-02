<?php

namespace BrasilNFeSdk\Envio\Empresa;

/**
 * Numeração de documento fiscal de uma empresa.
 * Usado como input em AtualizarNumeracao (upsert por tipoAmbiente + modeloDocumento + serie)
 * e como item de lista em ConsultarNumeracao.
 */
class Numeracao
{
    /**
     * Tipo de ambiente.
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente = 1;

    /**
     * Código do modelo do documento.
     * 55 - NF-e, 65 - NFC-e, 57 - CT-e, 58 - MDF-e, 10 - NFS-e, 6 - NF3-e, 21/22 - SCAN.
     */
    public int $modeloDocumento;

    /**
     * Série da numeração.
     */
    public string $serie;

    /**
     * Próximo número que será usado na emissão dessa série.
     * ATENÇÃO: setar um valor MENOR que o atual pode causar rejeição da SEFAZ
     * por número duplicado. A API aceita e registra a alteração, mas a
     * responsabilidade fiscal é do integrador.
     */
    public int $numero;

    /**
     * Indica se essa é a numeração padrão do modelo+ambiente.
     * Quando uma emissão é enviada sem informar a Serie, o sistema usa a
     * numeração marcada como padrão para o modelo+ambiente. Cada combinação
     * modelo+ambiente deve ter no máximo uma série padrão.
     */
    public bool $padrao = false;
}
