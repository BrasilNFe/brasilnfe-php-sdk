<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Outros\FciEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Outros\FciEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\FciEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Outros\FciEnvio::class,
        __NAMESPACE__ . '\\FciEnvio'
    );
}
