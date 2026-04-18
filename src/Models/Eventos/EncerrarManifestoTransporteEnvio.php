<?php

namespace BrasilNFeSdk\Models\Eventos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\MDFe\EncerrarManifestoTransporteEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\MDFe\EncerrarManifestoTransporteEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\EncerrarManifestoTransporteEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\MDFe\EncerrarManifestoTransporteEnvio::class,
        __NAMESPACE__ . '\\EncerrarManifestoTransporteEnvio'
    );
}
