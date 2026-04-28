<?php

namespace App\Services;

use InvalidArgumentException;

class ValidadorEdad {
    
    public function esMayor($edad) {
        if ($edad < 0) {
            throw new InvalidArgumentException("La edad no puede ser negativa");
        }
        return $edad >= 18;
    }
}