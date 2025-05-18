<?php

namespace BrasilNFeSdk;

use BrasilNFeSdk\Methods\Arquivos;
use BrasilNFeSdk\Methods\Consultas;
use BrasilNFeSdk\Methods\Empresa;
use BrasilNFeSdk\Methods\Eventos;
use BrasilNFeSdk\Methods\NotaFiscal;

class BrasilNFe
{
    public NotaFiscal $NotaFiscal;
    public Eventos $Eventos;
    public Consultas $Consultas;
    public Empresa $Empresa;
    public Arquivos $Arquivos;

    public function __construct(string $token, string $userToken = '', string $url = 'https://api.brasilnfe.com.br/services/')
    {
        $this->NotaFiscal = new NotaFiscal($token, $url . 'Fiscal/');
        $this->Eventos = new Eventos($token, $url . 'Fiscal/');
        $this->Consultas = new Consultas($token, $url . 'Fiscal/');
        $this->Arquivos = new Arquivos($token, $url . 'Fiscal/');

        if (!empty($userToken)) {
            $this->Empresa = new Empresa($token, $userToken, $url . 'Empresa/');
        }
    }
}

class BrasilNFeHelper
{
    const TIPO_SUBSTITUIR = 'Substituir';
    const TIPO_SOMAR = 'Somar';
    const TIPO_SUBTRAIR = 'Subtrair';

    public static function ratear(array &$itens, float $valorTotal, callable $seletor, callable $seletorProporcao, string $tipoRateio): void
    {
        $totalProporcao = array_sum(array_map($seletorProporcao, $itens));
        if ($totalProporcao == 0) return;

        $somaArredondada = 0;
        $ultimoIndex = count($itens) - 1;

        foreach ($itens as $i => &$item) {
            $proporcaoItem = $seletorProporcao($item);
            $proporcao = $proporcaoItem / $totalProporcao;

            $valorRateado = round(($proporcao * $valorTotal) / $proporcaoItem, 6);

            if ($i === $ultimoIndex) {
                $valorRateado = ($valorTotal - $somaArredondada) / $proporcaoItem;
            }

            $somaArredondada += $valorRateado * $proporcaoItem;

            $valorAtual = $seletor($item);
            $novoValor = self::aplicarRateio($valorAtual, $valorRateado, $tipoRateio);

            self::setDecimalProperty($item, $valorAtual, $novoValor);
        }
    }

    private static function aplicarRateio(float $valorAtual, float $valorRateado, string $tipoRateio): float
    {
        switch ($tipoRateio) {
            case self::TIPO_SUBSTITUIR:
                return $valorRateado;
            case self::TIPO_SOMAR:
                return $valorAtual + $valorRateado;
            case self::TIPO_SUBTRAIR:
                return $valorAtual - $valorRateado;
            default:
                return $valorAtual;
        }
    }

    private static function setDecimalProperty(object &$obj, float $valorAtual, float $novoValor): void
    {
        foreach (get_object_vars($obj) as $prop => $val) {
            if (is_numeric($val) && floatval($val) === $valorAtual) {
                $obj->$prop = $novoValor;
                break;
            }
        }
    }
}
