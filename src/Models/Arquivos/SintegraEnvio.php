<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Outros\SintegraEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Outros\SintegraEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\SintegraEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Outros\SintegraEnvio::class,
        __NAMESPACE__ . '\\SintegraEnvio'
    );
}
