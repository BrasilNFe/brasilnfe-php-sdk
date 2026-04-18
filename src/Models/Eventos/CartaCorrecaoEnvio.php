<?php

namespace BrasilNFeSdk\Models\Eventos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\CartaCorrecaoEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\CartaCorrecaoEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\CartaCorrecaoEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\CartaCorrecaoEnvio::class,
        __NAMESPACE__ . '\\CartaCorrecaoEnvio'
    );
}
