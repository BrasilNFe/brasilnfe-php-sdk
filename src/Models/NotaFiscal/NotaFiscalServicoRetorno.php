<?php

namespace BrasilNFeSdk\Models\NotaFiscal;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\NotaFiscalServicoRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\NotaFiscalServicoRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\NotaFiscalServicoRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\NotaFiscalServicoRetorno::class,
        __NAMESPACE__ . '\\NotaFiscalServicoRetorno'
    );
}
