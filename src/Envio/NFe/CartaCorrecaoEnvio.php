<?php

namespace BrasilNFeSdk\Envio\NFe;

/**
 * Evento de Carta de Correção (CCe). Para NF-e/NFC-e use o campo `correcao` (texto).
 * Para CT-e use a lista `correcoes` (lista de correções estruturadas).
 */
class CartaCorrecaoEnvio
{
    public function __construct()
    {
        $this->correcoes = [];
    }

    /**
     * Ambiente do documento original (DEVE bater com o ambiente onde a nota foi emitida).
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente = 1;

    /**
     * Chave de acesso de 44 dígitos da NF-e ou CT-e a corrigir.
     */
    public ?string $chaveNF = null;

    /**
     * Texto da correção (mínimo 15, máximo 1000 caracteres). Obrigatório para NF-e (modelo 55).
     * Não pode corrigir variáveis que afetam tributos nem dados de remetente/destinatário.
     * Para CT-e use a lista `correcoes` em vez deste campo.
     */
    public ?string $correcao = null;

    /**
     * Número sequencial do evento (1 a 20). Se omitido, o sistema usa o próximo disponível.
     */
    public ?int $numeroSequencial = null;

    /**
     * Lista de correções estruturadas (campo, grupo, valor). Usado SOMENTE para CT-e.
     * Para NF-e/NFC-e use o campo `correcao` acima.
     * @var list<Correcao>
     */
    public array $correcoes;
}

/**
 * Correção estruturada de Carta de Correção (CCe) do CT-e.
 */
class Correcao
{
    /** Nome do campo corrigido (ex.: "valor", "destinatario.nome"). */
    public string $campo;

    /** Grupo XML do campo corrigido. */
    public string $grupo;

    /** Novo valor do campo. */
    public string $valor;
}
