<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\Empresa\ConsultarCadastroEnvio;
use BrasilNFeSdk\Envio\Empresa\ConsultarCadastroRetorno;
use BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalServicoEnvio;
use BrasilNFeSdk\Envio\NFe\PreVisualizarNotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\StatusSefazEnvio;
use BrasilNFeSdk\Retorno\BuscarNotaFiscalRetorno;
use BrasilNFeSdk\Retorno\CalculoImpostosRetorno;
use BrasilNFeSdk\Retorno\NotaFiscalServicoRetorno;
use BrasilNFeSdk\Retorno\PreVisualizarNotaFiscalRetorno;
use BrasilNFeSdk\Retorno\SpedRetorno;
use BrasilNFeSdk\Retorno\StatusSefazRetorno;

class Consultas extends BrasilNFeRequest
{
    public function __construct(string $token, string $url)
    {
        parent::__construct($token, $url);
    }

    public function statusSefaz(StatusSefazEnvio $statusSefazEnvio): StatusSefazRetorno
    {
        return $this->request("StatusSefaz", $statusSefazEnvio, StatusSefazRetorno::class);
    }

    public function calcularImpostos(array $produtos): CalculoImpostosRetorno
    {
        return $this->request("CalcularImpostos", $produtos, CalculoImpostosRetorno::class);
    }

    public function preVisualizarNotaFiscal(PreVisualizarNotaFiscalEnvio $preVisualizarDanfeEnvio): PreVisualizarNotaFiscalRetorno
    {
        // $error = Validador::validaPreVisualizacao($preVisualizarDanfeEnvio);

        // if (!empty($error)) {
        //     $retorno = new PreVisualizarNotaFiscalRetorno();
        //     $retorno->error = $error;
        //     $retorno->status = false;

        //     return $retorno;
        // }

        return $this->request("PreVisualizarNotaFiscal", $preVisualizarDanfeEnvio, PreVisualizarNotaFiscalRetorno::class);
    }

    public function buscarNotaFiscalServico(BuscarNotaFiscalServicoEnvio $buscarNotaFiscalServicoEnvio): NotaFiscalServicoRetorno
    {
        return $this->request("BuscarNotaFiscalServico", $buscarNotaFiscalServicoEnvio, NotaFiscalServicoRetorno::class);
    }

    public function buscarNotaFiscal(BuscarNotaFiscalEnvio $buscarNotaFiscalEnvio): BuscarNotaFiscalRetorno
    {
        return $this->request("BuscarNotaFiscal", $buscarNotaFiscalEnvio, BuscarNotaFiscalRetorno::class);
    }

    public function consultarCadastroSefaz(ConsultarCadastroEnvio $consultarCadastroEnvio): ConsultarCadastroRetorno
    {
        return $this->request("ConsultarCadastroSefaz", $consultarCadastroEnvio, ConsultarCadastroRetorno::class);
    }

    public function buscarArquivoSped(string $codigo): SpedRetorno
    {
        return $this->request("BuscarArquivoSped/?codigo=$codigo", $codigo, SpedRetorno::class);
    }
}