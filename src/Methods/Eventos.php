<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\MDFe\EncerrarManifestoTransporteEnvio;
use BrasilNFeSdk\Envio\NFe\CancelarNotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\CartaCorrecaoEnvio;
use BrasilNFeSdk\Envio\NFe\InutilizarNumeracaoEnvio;
use BrasilNFeSdk\Envio\NFe\ManifestarNotaFiscalEnvio;
use BrasilNFeSdk\Retorno\EventoNotaFiscalRetorno;

class Eventos extends BrasilNFeRequest
{
    public function __construct(string $token, string $url)
    {
        parent::__construct($token, $url);
    }

    public function cancelarNotaFiscal(CancelarNotaFiscalEnvio $cancelarNotaFiscalEnvio): EventoNotaFiscalRetorno
    {
        // $error = Validador::validaNotaFiscalCancelamento($cancelarNotaFiscalEnvio);

        // if (!empty($error)) {
        //     $retorno = new EventoNotaFiscalRetorno();
        //     $retorno->error = $error;
        //     $retorno->status = 3;
        //     return $retorno;
        // }

        return $this->request("CancelNF", $cancelarNotaFiscalEnvio, EventoNotaFiscalRetorno::class);
    }

    public function enviarCartaCorrecao(CartaCorrecaoEnvio $cartaCorrecaoEnvio): EventoNotaFiscalRetorno
    {
        // $error = Validador::validaNotaFiscalCartaCorrecao($cartaCorrecaoEnvio);

        // if (!empty($error)) {
        //     $retorno = new EventoNotaFiscalRetorno();
        //     $retorno->error = $error;
        //     $retorno->status = 3;
        //     return $retorno;
        // }

        return $this->request("EnviarCartaCorrecao", $cartaCorrecaoEnvio, EventoNotaFiscalRetorno::class);
    }

    public function inutilizarNumeracao(InutilizarNumeracaoEnvio $inutilizarNumeracaoEnvio): EventoNotaFiscalRetorno
    {
        // $error = Validador::validaInutilizarNumeracao($inutilizarNumeracaoEnvio);

        // if (!empty($error)) {
        //     $retorno = new EventoNotaFiscalRetorno();
        //     $retorno->error = $error;
        //     $retorno->status = 3;
        //     return $retorno;
        // }

        return $this->request("InutilizarNumeracao", $inutilizarNumeracaoEnvio, EventoNotaFiscalRetorno::class);
    }

    public function manifestarNotaFiscal(ManifestarNotaFiscalEnvio $manifestarNotaFiscalEnvio): EventoNotaFiscalRetorno
    {
        // $error = Validador::validaManifestarNotaFiscal($manifestarNotaFiscalEnvio);

        // if (!empty($error)) {
        //     $retorno = new EventoNotaFiscalRetorno();
        //     $retorno->error = $error;
        //     $retorno->status = 3;
        //     return $retorno;
        // }

        return $this->request("ManifestarNotaFiscal", $manifestarNotaFiscalEnvio, EventoNotaFiscalRetorno::class);
    }

    public function encerrarManifestoTransporte(EncerrarManifestoTransporteEnvio $encerrarManifestoTransporteEnvio): EventoNotaFiscalRetorno
    {
        // $error = Validador::validaEncerrarManifestoTransporte($encerrarManifestoTransporteEnvio);

        // if (!empty($error)) {
        //     $retorno = new EventoNotaFiscalRetorno();
        //     $retorno->error = $error;
        //     $retorno->status = 3;
        //     return $retorno;
        // }

        return $this->request("EncerrarManifestoTransporte", $encerrarManifestoTransporteEnvio, EventoNotaFiscalRetorno::class);
    }
}
