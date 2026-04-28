<?php

namespace App\Services;

use InvalidArgumentException;

class ConversorTemperaturas {
    
    public function fahrenheitACelsius($fahrenheit) {
        if (!is_numeric($fahrenheit)) {
            throw new InvalidArgumentException("La temperatura debe ser un número");
        }
        return ($fahrenheit - 32) * 5 / 9;
    }

    public function celsiusAFahrenheit($celsius) {
        if (!is_numeric($celsius)) {
            throw new InvalidArgumentException("La temperatura debe ser un número");
        }
        return ($celsius * 9 / 5) + 32;
    }
}