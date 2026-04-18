<?php

namespace BrasilNFeSdk\Models\Empresa;

/**
 * Alias BC — reorganização estrutural para refletir o SDK C# principal.
 * A classe canônica permanece em \BrasilNFeSdk\Retorno\EmpresaRetorno.
 */

\class_exists(\BrasilNFeSdk\Retorno\EmpresaRetorno::class);

if (!\class_exists(__NAMESPACE__ . '\\EmpresaRetorno', false)) {
    \class_alias(
        \BrasilNFeSdk\Retorno\EmpresaRetorno::class,
        __NAMESPACE__ . '\\EmpresaRetorno'
    );
}
