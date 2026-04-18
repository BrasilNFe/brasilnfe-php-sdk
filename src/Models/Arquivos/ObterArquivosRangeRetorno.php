<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\ObterArquivosRangeRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\ObterArquivosRangeRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\ObterArquivosRangeRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\ObterArquivosRangeRetorno::class,
        __NAMESPACE__ . '\\ObterArquivosRangeRetorno'
    );
}
