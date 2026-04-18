<?php

namespace BrasilNFeSdk\Models\Outros;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\Erros.
 */

\class_exists(\BrasilNFeSdk\Retorno\Erros::class);

if (!\class_exists(__NAMESPACE__ . '\\Erros', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\Erros::class,
        __NAMESPACE__ . '\\Erros'
    );
}
