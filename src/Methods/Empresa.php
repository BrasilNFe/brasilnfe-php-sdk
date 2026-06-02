<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\Empresa\CertificadoEnvio;
use BrasilNFeSdk\Envio\Empresa\EmpresaEnvio;
use BrasilNFeSdk\Envio\Empresa\Numeracao;
use BrasilNFeSdk\Retorno\AtualizarNumeracaoRetorno;
use BrasilNFeSdk\Retorno\CertificadoRetorno;
use BrasilNFeSdk\Retorno\ConsultarNumeracaoRetorno;
use BrasilNFeSdk\Retorno\EmpresaRetorno;

class Empresa extends BrasilNFeRequest
{
    public function __construct(string $token, string $userToken, string $url)
    {
        parent::__construct($token, $url, $userToken);
    }

    public function alterarCertificado(CertificadoEnvio $certificado): CertificadoRetorno
    {
        return $this->request("AlterarCertificado", $certificado, CertificadoRetorno::class);
    }

    public function verificarCertificado(CertificadoEnvio $certificado): CertificadoRetorno
    {
        return $this->request("VerifyCertificate", $certificado, CertificadoRetorno::class);
    }

    public function adicionarEmpresa(EmpresaEnvio $empresa): EmpresaRetorno
    {
        return $this->request("AdicionarEmpresa", $empresa, EmpresaRetorno::class);
    }

    public function editarEmpresa(EmpresaEnvio $empresa): EmpresaRetorno
    {
        return $this->request("EditarEmpresa", $empresa, EmpresaRetorno::class);
    }

    /** @return EmpresaEnvio */
    public function buscarEmpresa(): EmpresaEnvio
    {
        return $this->request("BuscarEmpresa", "", EmpresaEnvio::class);
    }

    /** @return EmpresaEnvio[] */
    public function buscarTodasEmpresas(): array
    {
        return $this->request("BuscarTodasEmpresas", "", EmpresaEnvio::class, true);
    }

    public function deletarEmpresa(): EmpresaRetorno
    {
        return $this->request("DeletarEmpresa", "", EmpresaRetorno::class);
    }

    public function gerarLinkAtivacao(): string
    {
        $response = $this->request("GerarLinkAtivacao", "", 'string', false, 'raw');
        $decoded = json_decode((string) $response, true);
        return is_string($decoded) ? $decoded : (string) $response;
    }

    public function consultarNumeracao(): ConsultarNumeracaoRetorno
    {
        return $this->request("ConsultarNumeracao", "", ConsultarNumeracaoRetorno::class);
    }

    public function atualizarNumeracao(Numeracao $numeracao): AtualizarNumeracaoRetorno
    {
        return $this->request("AtualizarNumeracao", $numeracao, AtualizarNumeracaoRetorno::class);
    }
}
