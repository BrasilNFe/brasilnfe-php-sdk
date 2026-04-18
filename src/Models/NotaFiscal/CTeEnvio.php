<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\CTe\CTeEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\CTe\CTeEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\CTeEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\CTe\CTeEnvio::class,
        __NAMESPACE__ . '\\CTeEnvio'
    );
}
