<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\PreVisualizarNotaFiscalEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\PreVisualizarNotaFiscalEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\PreVisualizarNotaFiscalEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\PreVisualizarNotaFiscalEnvio::class,
        __NAMESPACE__ . '\\PreVisualizarNotaFiscalEnvio'
    );
}
