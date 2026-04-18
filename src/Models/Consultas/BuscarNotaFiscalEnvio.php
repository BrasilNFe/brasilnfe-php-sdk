<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\BuscarNotaFiscalEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalEnvio::class,
        __NAMESPACE__ . '\\BuscarNotaFiscalEnvio'
    );
}
