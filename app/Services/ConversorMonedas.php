<?php

namespace App\Services;

use InvalidArgumentException;

class ConversorMonedas {
    
    public function pesosADolares($pesos, $cambio = 17.40) {
        if ($pesos < 0) {
            throw new InvalidArgumentException("La cantidad de pesos no puede ser negativa");
        }
        if ($cambio <= 0) {
            throw new InvalidArgumentException("La tasa de cambio debe ser mayor a 0");
        }
        return $pesos / $cambio;
    }

    public function dolaresAPesos($dolares, $cambio = 17.40) {
        if ($dolares < 0) {
            throw new InvalidArgumentException("La cantidad de dolares no puede ser negativa");
        }
        if ($cambio <= 0) {
            throw new InvalidArgumentException("La tasa de cambio debe ser mayor a 0");
        }
        return $dolares * $cambio;
    }
}