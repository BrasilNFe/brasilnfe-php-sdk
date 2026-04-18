<?php

namespace BrasilNFeSdk\Models\Empresa;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Empresa\EmpresaEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Empresa\EmpresaEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\EmpresaEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Empresa\EmpresaEnvio::class,
        __NAMESPACE__ . '\\EmpresaEnvio'
    );
}
