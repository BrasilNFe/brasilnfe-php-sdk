<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\SintegraRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\SintegraRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\SintegraRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\SintegraRetorno::class,
        __NAMESPACE__ . '\\SintegraRetorno'
    );
}
