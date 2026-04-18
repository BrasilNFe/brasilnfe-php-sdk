<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\DCeEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\DCeEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\DCeEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\DCeEnvio::class,
        __NAMESPACE__ . '\\DCeEnvio'
    );
}
