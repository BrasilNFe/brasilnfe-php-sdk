<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\PegarArquivoEventoEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\PegarArquivoEventoEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\PegarArquivoEventoEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\PegarArquivoEventoEnvio::class,
        __NAMESPACE__ . '\\PegarArquivoEventoEnvio'
    );
}
