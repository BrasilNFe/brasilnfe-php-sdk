<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\ObterArquivosRangeEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\ObterArquivosRangeEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\ObterArquivosRangeEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\ObterArquivosRangeEnvio::class,
        __NAMESPACE__ . '\\ObterArquivosRangeEnvio'
    );
}
