<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Outros\SpedEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Outros\SpedEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\SpedEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Outros\SpedEnvio::class,
        __NAMESPACE__ . '\\SpedEnvio'
    );
}
