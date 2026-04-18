<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\SpedRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\SpedRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\SpedRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\SpedRetorno::class,
        __NAMESPACE__ . '\\SpedRetorno'
    );
}
