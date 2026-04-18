<?php

namespace BrasilNFeSdk\Models\Consultas;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Envio\Empresa\ConsultarCadastroRetorno.
 */

\class_exists(\BrasilNFeSdk\Envio\Empresa\ConsultarCadastroRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\ConsultarCadastroRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Envio\Empresa\ConsultarCadastroRetorno::class,
        __NAMESPACE__ . '\\ConsultarCadastroRetorno'
    );
}
