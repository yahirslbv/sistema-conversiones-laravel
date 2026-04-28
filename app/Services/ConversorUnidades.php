<?php

namespace App\Services;

use InvalidArgumentException;

class ConversorUnidades {
    
    public function kmAMillas($km) {
        if ($km < 0) {
            throw new InvalidArgumentException("La cantidad de kilometros no puede ser negativa");
        }
        return $km * 0.621371;
    }

    public function millasAKm($millas) {
        if ($millas < 0) {
            throw new InvalidArgumentException("La cantidad de millas no puede ser negativa");
        }
        return $millas / 0.621371;
    }
}