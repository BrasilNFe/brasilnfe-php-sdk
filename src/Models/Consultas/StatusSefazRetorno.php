<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\StatusSefazRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\StatusSefazRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\StatusSefazRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\StatusSefazRetorno::class,
        __NAMESPACE__ . '\\StatusSefazRetorno'
    );
}
