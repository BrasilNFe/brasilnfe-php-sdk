<?php

namespace BrasilNFeSdk\Envio\Empresa;

class CertificadoEnvio
{
    /**
     * Senha do certificado digital
     */
    public ?string $senha = null;

    /**
     * Certificado digital em formato Base64
     */
    public ?string $base64CertificateFile = null;

    /**
     * Indica se o certificado é interno (gerado pelo sistema)
     */
    public bool $interno = false;
}