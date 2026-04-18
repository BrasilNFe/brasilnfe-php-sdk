<?php

namespace BrasilNFeSdk\Models\Empresa;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\PegarConfiguracoesRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\PegarConfiguracoesRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\PegarConfiguracoesRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\PegarConfiguracoesRetorno::class,
        __NAMESPACE__ . '\\PegarConfiguracoesRetorno'
    );
}
