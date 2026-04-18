<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\NFe\ObterArquivosRangeEnvio;
use BrasilNFeSdk\Envio\NFe\PegarArquivoEnvio;
use BrasilNFeSdk\Envio\NFe\PegarArquivoEventoEnvio;
use BrasilNFeSdk\Envio\Outros\ArqEnerComEnvio;
use BrasilNFeSdk\Envio\Outros\ArqEnerComRetorno;
use BrasilNFeSdk\Envio\Outros\FciEnvio;
use BrasilNFeSdk\Envio\Outros\FciRetorno;
use BrasilNFeSdk\Envio\Outros\SintegraEnvio;
use BrasilNFeSdk\Envio\Outros\SpedEnvio;
use BrasilNFeSdk\Envio\Outros\UnificarSpedEnvio;
use BrasilNFeSdk\Retorno\ObterArquivosRangeRetorno;
use BrasilNFeSdk\Retorno\SintegraRetorno;
use BrasilNFeSdk\Retorno\SpedRetorno;

class Arquivos extends BrasilNFeRequest
{
    public function __construct(string $token, string $url)
    {
        parent::__construct($token, $url);
    }

    public function obterArquivoSintegra(SintegraEnvio $sintegraEnvio): SintegraRetorno
    {
        return $this->request('ObterArquivoSintegra', $sintegraEnvio, SintegraRetorno::class);
    }

    public function obterArquivoFci(FciEnvio $fciEnvio): FciRetorno
    {
        return $this->request('ObterArquivoFci', $fciEnvio, FciRetorno::class);
    }

    public function obterArqEnerCom(ArqEnerComEnvio $arqEnerComEnvio): ArqEnerComRetorno
    {
        return $this->request('ObterArquivoNFEnerCom', $arqEnerComEnvio, ArqEnerComRetorno::class);
    }

    public function obterArquivoSped(SpedEnvio $spedEnvio): SpedRetorno
    {
        return $this->request('ObterArquivoSped', $spedEnvio, SpedRetorno::class);
    }

    public function obterArquivoSpedUnificado(UnificarSpedEnvio $unificarSpedEnvio): SpedRetorno
    {
        return $this->request('ObterArquivoSpedUnificado', $unificarSpedEnvio, SpedRetorno::class);
    }

    public function recriarArquivoSped($codigo): SpedRetorno
    {
        return $this->request("RecriarArquivoSped/?codigo=$codigo", $codigo, SpedRetorno::class);
    }

    /**
     * @return string Dados binários do arquivo (conteúdo decodificado do base64)
     */
    public function pegarArquivo(PegarArquivoEnvio $pegarArquivoEnvio): string
    {
        return $this->request('GetFile', $pegarArquivoEnvio, 'string', false, 'base64');
    }

    /**
     * @return string Dados binários do arquivo (conteúdo decodificado do base64)
     */
    public function pegarArquivoEvento(PegarArquivoEventoEnvio $pegarArquivoEventoEnvio): string
    {
        return $this->request('GetFileFromEvent', $pegarArquivoEventoEnvio, 'string', false, 'base64');
    }

    public function obterArquivosPorRange(ObterArquivosRangeEnvio $pegarArquivosRangeEnvio): ObterArquivosRangeRetorno
    {
        return $this->request('ObterArquivosPorRange', $pegarArquivosRangeEnvio, ObterArquivosRangeRetorno::class);
    }
}
