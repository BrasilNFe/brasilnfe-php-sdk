<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\NotaFiscalEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\NotaFiscalEnvio::class,
        __NAMESPACE__ . '\\NotaFiscalEnvio'
    );
}
