<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\CalculoImpostosRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\CalculoImpostosRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\CalculoImpostosRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\CalculoImpostosRetorno::class,
        __NAMESPACE__ . '\\CalculoImpostosRetorno'
    );
}
