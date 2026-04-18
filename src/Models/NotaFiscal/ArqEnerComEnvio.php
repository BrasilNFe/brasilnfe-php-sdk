<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Outros\ArqEnerComEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Outros\ArqEnerComEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\ArqEnerComEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Outros\ArqEnerComEnvio::class,
        __NAMESPACE__ . '\\ArqEnerComEnvio'
    );
}
