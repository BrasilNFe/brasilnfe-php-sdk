<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\MDFe\ManifestoTransporteEnvio;
use BrasilNFeSdk\Envio\MDFe\ManifestoTransporteRetorno;
use BrasilNFeSdk\Envio\NFe\NotaFiscalComplementarEnvio;
use BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\NotaFiscalServicoEnvio;
use BrasilNFeSdk\Envio\Outros\NFEnerComEnvio;
use BrasilNFeSdk\Envio\Outros\NFEnerComRetorno;
use BrasilNFeSdk\Retorno\NotaFiscalRetorno;
use BrasilNFeSdk\Retorno\NotaFiscalServicoRetorno;
use BrasilNFeSdk\Validador;

class NotaFiscal extends BrasilNFeRequest
{
    public function __construct(string $token, string $url)
    {
        parent::__construct($token, $url);
    }

    public function enviarNotaFiscal(NotaFiscalEnvio $notaFiscal, ?int $CRT = null): NotaFiscalRetorno
    {
        // $error = Validador::validaNotaFiscalEnvio($notaFiscal, $CRT);

        // if (!empty($error)) {
        //     $retorno = new NotaFiscalRetorno();
        //     $retorno->error = $error;
        //     return $retorno;
        // }

        return $this->request("EnviarNotaFiscal", $notaFiscal, NotaFiscalRetorno::class);
    }

    public function enviarNotaFiscalServico(NotaFiscalServicoEnvio $notaFiscal): NotaFiscalServicoRetorno
    {
        // $error = Validador::validaNFSeEnvio($notaFiscal);

        // if (!empty($error)) {
        //     $retorno = new NotaFiscalServicoRetorno();
        //     $retorno->error = $error;
        //     $retorno->statusLote = 3;
        //     return $retorno;
        // }

        return $this->request("EnviarNotaFiscalServico", $notaFiscal, NotaFiscalServicoRetorno::class);
    }

    public function enviarManifestoTransporte(ManifestoTransporteEnvio $manifestoTransporte): ManifestoTransporteRetorno
    {
        // $error = Validador::validaManifestoTransporteEnvio($manifestoTransporte);

        // if (!empty($error)) {
        //     $retorno = new ManifestoTransporteRetorno();
        //     $retorno->error = $error;
        //     $retorno->status = 3;
        //     return $retorno;
        // }

        return $this->request("EnviarManifestoTransporte", $manifestoTransporte, ManifestoTransporteRetorno::class);
    }

    public function enviarNFEnerCom(NFEnerComEnvio $nFEnerComEnvio): NFEnerComRetorno
    {
        // $error = Validador::validaNFEnerComEnvio($nFEnerComEnvio, false);

        // if (!empty($error['erros'])) {
        //     $retorno = new NFEnerComRetorno();
        //     $retorno->erros = $error['erros'];
        //     $retorno->avisos = $error['avisos'] ?? [];
        //     $retorno->status = false;
        //     return $retorno;
        // }

        return $this->request("EnviarNFEnerCom", $nFEnerComEnvio, NFEnerComRetorno::class);
    }

    public function enviarNotaFiscalComplementar(NotaFiscalComplementarEnvio $notaFiscal): NotaFiscalRetorno
    {
        // $error = Validador::validaNotaFiscalComplementarEnvio($notaFiscal);

        // if (!empty($error['erros'])) {
        //     $retorno = new NotaFiscalRetorno();
        //     $retorno->error = $error;
        //     return $retorno;
        // }

        return $this->request("EnviarNotaFiscalComplementar", $notaFiscal, NotaFiscalRetorno::class);
    }
}
