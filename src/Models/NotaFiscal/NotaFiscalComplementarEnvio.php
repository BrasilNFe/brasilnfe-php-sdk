<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\NotaFiscalComplementarEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\NotaFiscalComplementarEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\NotaFiscalComplementarEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\NotaFiscalComplementarEnvio::class,
        __NAMESPACE__ . '\\NotaFiscalComplementarEnvio'
    );
}
