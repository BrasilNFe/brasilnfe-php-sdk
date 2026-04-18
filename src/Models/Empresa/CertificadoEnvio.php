<?php

namespace BrasilNFeSdk\Models\Empresa;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Empresa\CertificadoEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Empresa\CertificadoEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\CertificadoEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Empresa\CertificadoEnvio::class,
        __NAMESPACE__ . '\\CertificadoEnvio'
    );
}
