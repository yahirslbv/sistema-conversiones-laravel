<?php

namespace App\Services;

use InvalidArgumentException;

class CalculadoraDescuento {
    
    public function calcular($pre_og, $porcent) {
        if ($pre_og < 0) {
            throw new InvalidArgumentException("El precio original no puede ser negativo");
        }
        if ($porcent < 0 || $porcent > 100) {
            throw new InvalidArgumentException("El porcentaje debe estar entre 0 y 100");
        }
        $descuento = $pre_og * ($porcent / 100);
        return $pre_og - $descuento;
    }
}