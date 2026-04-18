<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Empresa\ConsultarCadastroEnvio.
 */

\class_exists(\BrasilNFeSdk\Envio\Empresa\ConsultarCadastroEnvio::class);

if (!\class_exists(__NAMESPACE__ . '\\ConsultarCadastroEnvio', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Empresa\ConsultarCadastroEnvio::class,
        __NAMESPACE__ . '\\ConsultarCadastroEnvio'
    );
}
