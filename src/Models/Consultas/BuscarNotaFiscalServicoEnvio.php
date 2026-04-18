<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalServicoEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalServicoEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\BuscarNotaFiscalServicoEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\BuscarNotaFiscalServicoEnvio::class,
        __NAMESPACE__ . '\\BuscarNotaFiscalServicoEnvio'
    );
}
