<?php

namespace BrasilNFeSdk\Models\Outros;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Outros\Pessoa.
 */

\class_exists(\BrasilNFeSdk\Envio\Outros\Pessoa::class);

if (!\class_exists(__NAMESPACE__ . '\\Pessoa', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Outros\Pessoa::class,
        __NAMESPACE__ . '\\Pessoa'
    );
}
