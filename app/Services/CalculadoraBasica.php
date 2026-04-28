<?php

namespace App\Services;

use InvalidArgumentException;

class CalculadoraBasica {
    
    public function sumar($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Los argumentos deben ser números");
        }
        return $a + $b;
    }

    public function restar($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Los argumentos deben ser números");
        }
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Los argumentos deben ser números");
        }
        return $a * $b;
    }

    public function dividir($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Los argumentos deben ser números");
        }
        if ($b == 0) {
            throw new InvalidArgumentException("No se puede dividir entre cero");
        }
        return $a / $b;
    }
}