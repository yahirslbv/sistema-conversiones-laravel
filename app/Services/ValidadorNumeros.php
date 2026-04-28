<?php

namespace App\Services;

use InvalidArgumentException;

class ValidadorNumeros {
    
    public function esPar($numero) {
        if (!is_int($numero)) {
            throw new InvalidArgumentException("El número debe ser un entero");
        }
        return $numero % 2 === 0;
    }

    public function esImpar($numero) {
        if (!is_int($numero)) {
            throw new InvalidArgumentException("El número debe ser un entero");
        }
        return $numero % 2 !== 0;
    }
}