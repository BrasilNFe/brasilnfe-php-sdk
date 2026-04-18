<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\InutilizarNumeracaoEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\InutilizarNumeracaoEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\InutilizarNumeracaoEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\InutilizarNumeracaoEnvio::class,
        __NAMESPACE__ . '\\InutilizarNumeracaoEnvio'
    );
}
