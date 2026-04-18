<?php

namespace BrasilNFeSdk\Models\Arquivos;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\NFe\PegarArquivoEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\NFe\PegarArquivoEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\PegarArquivoEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\NFe\PegarArquivoEnvio::class,
        __NAMESPACE__ . '\\PegarArquivoEnvio'
    );
}
