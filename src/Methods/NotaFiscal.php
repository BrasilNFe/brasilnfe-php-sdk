<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\CTe\CTeEnvio;
use BrasilNFeSdk\Envio\MDFe\ManifestoTransporteEnvio;
use BrasilNFeSdk\Envio\MDFe\ManifestoTransporteRetorno;
use BrasilNFeSdk\Envio\NFe\DCeEnvio;
use BrasilNFeSdk\Envio\NFe\NotaFiscalComplementarEnvio;
use BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\NotaFiscalLoteEnvio;
use BrasilNFeSdk\Envio\NFe\NotaFiscalServicoEnvio;
use BrasilNFeSdk\Envio\Outros\NFEnerComEnvio;
use BrasilNFeSdk\Envio\Outros\NFEnerComRetorno;
use BrasilNFeSdk\Retorno\CTeRetorno;
use BrasilNFeSdk\Retorno\DCeRetorno;
use BrasilNFeSdk\Retorno\NotaFiscalLoteRetorno;
use BrasilNFeSdk\Retorno\NotaFiscalRetorno;
use BrasilNFeSdk\Retorno\NotaFiscalServicoRetorno;

class NotaFiscal extends BrasilNFeRequest
{
    public function __construct(string $token, string $url)
    {
        parent::__construct($token, $url);
    }

    public function enviarNotaFiscal(NotaFiscalEnvio $notaFiscal, ?int $CRT = null): NotaFiscalRetorno
    {
        return $this->request("EnviarNotaFiscal", $notaFiscal, NotaFiscalRetorno::class);
    }

    public function enviarNotaFiscalLote(NotaFiscalLoteEnvio $notaFiscalLote, ?int $CRT = null): NotaFiscalLoteRetorno
    {
        return $this->request("EnviarNotaFiscalLote", $notaFiscalLote, NotaFiscalLoteRetorno::class);
    }

    public function enviarConhecimentoTransporte(CTeEnvio $cteEnvio): CTeRetorno
    {
        return $this->request("EnviarConhecimentoTransporte", $cteEnvio, CTeRetorno::class);
    }

    public function enviarDeclaracaoConteudo(DCeEnvio $dceEnvio): DCeRetorno
    {
        return $this->request("EnviarDeclaracaoConteudo", $dceEnvio, DCeRetorno::class);
    }

    public function enviarNotaFiscalServico(NotaFiscalServicoEnvio $notaFiscal): NotaFiscalServicoRetorno
    {
        return $this->request("EnviarNotaFiscalServico", $notaFiscal, NotaFiscalServicoRetorno::class);
    }

    public function enviarManifestoTransporte(ManifestoTransporteEnvio $manifestoTransporte): ManifestoTransporteRetorno
    {
        return $this->request("EnviarManifestoTransporte", $manifestoTransporte, ManifestoTransporteRetorno::class);
    }

    public function enviarNFEnerCom(NFEnerComEnvio $nFEnerComEnvio): NFEnerComRetorno
    {
        return $this->request("EnviarNFEnerCom", $nFEnerComEnvio, NFEnerComRetorno::class);
    }

    public function enviarNotaFiscalComplementar(NotaFiscalComplementarEnvio $notaFiscal): NotaFiscalRetorno
    {
        return $this->request("EnviarNotaFiscalComplementar", $notaFiscal, NotaFiscalRetorno::class);
    }
}
