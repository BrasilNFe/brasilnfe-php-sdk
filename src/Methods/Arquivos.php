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

    public function gerarArquivoSintegra(SintegraEnvio $sintegraEnvio): SintegraRetorno
    {
        return $this->request('GerarArquivoSintegra', $sintegraEnvio, SintegraRetorno::class);
    }

    public function gerarArquivoFci(FciEnvio $fciEnvio): FciRetorno
    {
        return $this->request('GerarArquivoFci', $fciEnvio, FciRetorno::class);
    }

    public function obterArqEnerCom(ArqEnerComEnvio $arqEnerComEnvio): ArqEnerComRetorno
    {
        return $this->request('ObterArquivoNFEnerCom', $arqEnerComEnvio, ArqEnerComRetorno::class);
    }

    public function gerarArquivoSped(SpedEnvio $spedEnvio): SpedRetorno
    {
        return $this->request('GerarArquivoSped', $spedEnvio, SpedRetorno::class);
    }

    public function unificarArquivoSped(UnificarSpedEnvio $unificarSpedEnvio): SpedRetorno
    {
        return $this->request('UnificarArquivoSped', $unificarSpedEnvio, SpedRetorno::class);
    }

    public function recriarArquivoSped($codigo): SpedRetorno
    {
        return $this->request("RecriarArquivoSped/?codigo=$codigo", $codigo, SpedRetorno::class);
    }

    /**
     * @return string Dados binários do arquivo (conteúdo decodificado do base64)
     */
    public function obterArquivoNotaFiscal(PegarArquivoEnvio $pegarArquivoEnvio): string
    {
        return $this->request('ObterArquivoNotaFiscal', $pegarArquivoEnvio, 'string', false, 'base64');
    }

    /**
     * @return string Dados binários do arquivo (conteúdo decodificado do base64)
     */
    public function obterArquivoEvento(PegarArquivoEventoEnvio $pegarArquivoEventoEnvio): string
    {
        return $this->request('ObterArquivoEvento', $pegarArquivoEventoEnvio, 'string', false, 'base64');
    }

    public function obterArquivosPorPeriodo(ObterArquivosRangeEnvio $pegarArquivosRangeEnvio): ObterArquivosRangeRetorno
    {
        return $this->request('ObterArquivosPorPeriodo', $pegarArquivosRangeEnvio, ObterArquivosRangeRetorno::class);
    }
}
