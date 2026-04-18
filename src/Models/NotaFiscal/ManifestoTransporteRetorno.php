<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\MDFe\ManifestoTransporteRetorno.
 */

\class_exists(\BrasilNFeSdk\Envio\MDFe\ManifestoTransporteRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\ManifestoTransporteRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\MDFe\ManifestoTransporteRetorno::class,
        __NAMESPACE__ . '\\ManifestoTransporteRetorno'
    );
}
