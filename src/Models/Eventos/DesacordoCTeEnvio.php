<?php

namespace BrasilNFeSdk\Models\Eventos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\CTe\DesacordoCTeEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\CTe\DesacordoCTeEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\DesacordoCTeEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\CTe\DesacordoCTeEnvio::class,
        __NAMESPACE__ . '\\DesacordoCTeEnvio'
    );
}
