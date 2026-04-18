<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\PreVisualizarNotaFiscalRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\PreVisualizarNotaFiscalRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\PreVisualizarNotaFiscalRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\PreVisualizarNotaFiscalRetorno::class,
        __NAMESPACE__ . '\\PreVisualizarNotaFiscalRetorno'
    );
}
