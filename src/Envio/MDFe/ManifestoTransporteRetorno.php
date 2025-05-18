<?php

namespace BrasilNFeSdk\Envio\MDFe;

use BrasilNFeSdk\Retorno\Erros;

/**
 * Class ManifestoTransporteRetorno
 */
class ManifestoTransporteRetorno extends Erros
{
    /** @var int */
    public int $numero;
    
    /** @var string */
    public string $chave;

    /** @var string */
    public string $tipoAmbiente;
    
    /** @var int */
    public int $codRespostaSefaz;
    
    /**
     * 1 - Lote processado
     * 2 - Aguardando processamento
     * 3 - Ocorreu um erro ao processar o lote
     * @var int
     */
    public int $status;

    /** @var string */
    public string $base64Xml;

    /** @var string */
    public string $base64Damdfe;
}