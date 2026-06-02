<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\Empresa\ConsultarCadastroEnvio;
use BrasilNFeSdk\Envio\Empresa\ConsultarCadastroRetorno;
use BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\ConsultarLoteNFeEnvio;
use BrasilNFeSdk\Envio\NFe\PreVisualizarNotaFiscalEnvio;
use BrasilNFeSdk\Envio\NFe\StatusSefazEnvio;
use BrasilNFeSdk\Envio\NFSe\BuscarNotaFiscalServicoEnvio;
use BrasilNFeSdk\Retorno\BuscarNotaFiscalRetorno;
use BrasilNFeSdk\Retorno\CalculoImpostosRetorno;
use BrasilNFeSdk\Retorno\NFSe\NotaFiscalServicoRetorno;
use BrasilNFeSdk\Retorno\NotaFiscalLoteRetorno;
use BrasilNFeSdk\Retorno\PreVisualizarNotaFiscalRetorno;
use BrasilNFeSdk\Retorno\SpedRetorno;
use BrasilNFeSdk\Retorno\StatusSefazRetorno;

class Consultas extends BrasilNFeRequest
{
    public function __construct(string $token, string $url)
    {
        parent::__construct($token, $url);
    }

    public function consultarStatusSefaz(StatusSefazEnvio $statusSefazEnvio): StatusSefazRetorno
    {
        return $this->request("ConsultarStatusSefaz", $statusSefazEnvio, StatusSefazRetorno::class);
    }

    public function calcularImpostos(array $produtos): CalculoImpostosRetorno
    {
        return $this->request("CalcularImpostos", $produtos, CalculoImpostosRetorno::class);
    }

    public function preVisualizarNotaFiscal(PreVisualizarNotaFiscalEnvio $preVisualizarDanfeEnvio): PreVisualizarNotaFiscalRetorno
    {
        return $this->request("PreVisualizarNotaFiscal", $preVisualizarDanfeEnvio, PreVisualizarNotaFiscalRetorno::class);
    }

    public function buscarNotaFiscalServico(BuscarNotaFiscalServicoEnvio $buscarNotaFiscalServicoEnvio): NotaFiscalServicoRetorno
    {
        return $this->request("BuscarNotaFiscalServico", $buscarNotaFiscalServicoEnvio, NotaFiscalServicoRetorno::class);
    }

    public function obterNotasFiscais(BuscarNotaFiscalEnvio $buscarNotaFiscalEnvio): BuscarNotaFiscalRetorno
    {
        return $this->request("ObterNotasFiscais", $buscarNotaFiscalEnvio, BuscarNotaFiscalRetorno::class);
    }

    public function consultarCadastroSefaz(ConsultarCadastroEnvio $consultarCadastroEnvio): ConsultarCadastroRetorno
    {
        return $this->request("ConsultarCadastroSefaz", $consultarCadastroEnvio, ConsultarCadastroRetorno::class);
    }

    public function obterArquivoSped(string $codigo): SpedRetorno
    {
        return $this->request("ObterArquivoSped/?codigo=$codigo", $codigo, SpedRetorno::class);
    }

    public function consultarLoteNFe(ConsultarLoteNFeEnvio $envio): NotaFiscalLoteRetorno
    {
        return $this->request("ConsultarLoteNFe", $envio, NotaFiscalLoteRetorno::class);
    }
}
