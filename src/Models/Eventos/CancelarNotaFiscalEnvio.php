<?php

namespace BrasilNFeSdk\Models\Eventos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\CancelarNotaFiscalEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\CancelarNotaFiscalEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\CancelarNotaFiscalEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\CancelarNotaFiscalEnvio::class,
        __NAMESPACE__ . '\\CancelarNotaFiscalEnvio'
    );
}
