<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\ManifestarNotaFiscalEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\ManifestarNotaFiscalEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\ManifestarNotaFiscalEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\ManifestarNotaFiscalEnvio::class,
        __NAMESPACE__ . '\\ManifestarNotaFiscalEnvio'
    );
}
