<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Outros\UnificarSpedEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Outros\UnificarSpedEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\UnificarSpedEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Outros\UnificarSpedEnvio::class,
        __NAMESPACE__ . '\\UnificarSpedEnvio'
    );
}
