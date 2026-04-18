<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\MDFe\ManifestoTransporteEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\MDFe\ManifestoTransporteEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\ManifestoTransporteEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\MDFe\ManifestoTransporteEnvio::class,
        __NAMESPACE__ . '\\ManifestoTransporteEnvio'
    );
}
