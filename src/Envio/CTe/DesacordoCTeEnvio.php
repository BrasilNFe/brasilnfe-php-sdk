<?php

namespace BrasilNFeSdk\Envio\CTe;

/**
 * Evento de Prestação de Serviço em Desacordo do CT-e. Permite ao destinatário
 * ou tomador registrar que a prestação do serviço não ocorreu conforme acordado.
 */
class DesacordoCTeEnvio
{
    /**
     * Ambiente do CT-e original (DEVE bater com o ambiente onde o CT-e foi emitido).
     * 1 - Produção
     * 2 - Homologação
     */
    public int $tipoAmbiente = 1;

    /**
     * Chave de acesso de 44 dígitos do CT-e em desacordo.
     */
    public string $chave;

    /**
     * Descrição do motivo do desacordo. Mínimo 15 caracteres.
     */
    public string $observacao;

    /**
     * Número sequencial do evento (1 a 20). Se omitido, o sistema usa o próximo disponível.
     */
    public ?int $numeroSequencial = null;
}
