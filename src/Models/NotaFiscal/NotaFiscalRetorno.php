<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\NotaFiscalRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\NotaFiscalRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\NotaFiscalRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\NotaFiscalRetorno::class,
        __NAMESPACE__ . '\\NotaFiscalRetorno'
    );
}
