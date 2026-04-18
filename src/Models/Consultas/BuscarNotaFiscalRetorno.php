<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\BuscarNotaFiscalRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\BuscarNotaFiscalRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\BuscarNotaFiscalRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\BuscarNotaFiscalRetorno::class,
        __NAMESPACE__ . '\\BuscarNotaFiscalRetorno'
    );
}
