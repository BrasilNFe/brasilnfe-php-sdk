<?php

namespace BrasilNFeSdk\Models\Eventos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\EventoNotaFiscalRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\EventoNotaFiscalRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\EventoNotaFiscalRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\EventoNotaFiscalRetorno::class,
        __NAMESPACE__ . '\\EventoNotaFiscalRetorno'
    );
}
