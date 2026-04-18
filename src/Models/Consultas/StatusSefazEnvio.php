<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\StatusSefazEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\StatusSefazEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\StatusSefazEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\StatusSefazEnvio::class,
        __NAMESPACE__ . '\\StatusSefazEnvio'
    );
}
