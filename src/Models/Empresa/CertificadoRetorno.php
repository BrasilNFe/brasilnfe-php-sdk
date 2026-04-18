<?php

namespace BrasilNFeSdk\Models\Empresa;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\CertificadoRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\CertificadoRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\CertificadoRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\CertificadoRetorno::class,
        __NAMESPACE__ . '\\CertificadoRetorno'
    );
}
