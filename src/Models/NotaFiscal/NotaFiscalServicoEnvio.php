<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\NotaFiscalServicoEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\NotaFiscalServicoEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\NotaFiscalServicoEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\NotaFiscalServicoEnvio::class,
        __NAMESPACE__ . '\\NotaFiscalServicoEnvio'
    );
}
