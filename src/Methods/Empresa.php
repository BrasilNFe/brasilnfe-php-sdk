<?php

namespace BrasilNFeSdk\Methods;

use BrasilNFeSdk\BrasilNFeRequest;
use BrasilNFeSdk\Envio\Empresa\CertificadoEnvio;
use BrasilNFeSdk\Envio\Empresa\EmpresaEnvio;
use BrasilNFeSdk\Retorno\CertificadoRetorno;
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
        // $error = Validador::validaEmpresaEnvio($empresa);

        // if (!empty($error)) {
        //     $retorno = new EmpresaRetorno();
        //     $retorno->error = $error;
        //     return $retorno;
        // }

        return $this->request("AdicionarEmpresa", $empresa, EmpresaRetorno::class);
    }

    public function editarEmpresa(EmpresaEnvio $empresa): EmpresaRetorno
    {
        // $error = Validador::validaEmpresaEnvio($empresa);

        // if (!empty($error)) {
        //     $retorno = new EmpresaRetorno();
        //     $retorno->error = $error;
        //     return $retorno;
        // }

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
}
