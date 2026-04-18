<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Outros\GnreEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Outros\GnreEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\GnreEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Outros\GnreEnvio::class,
        __NAMESPACE__ . '\\GnreEnvio'
    );
}
