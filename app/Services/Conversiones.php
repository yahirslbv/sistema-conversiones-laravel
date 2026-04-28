<?php
namespace App\Services;

use InvalidArgumentException;

class ConversorMonedas {
    public function pesosADolares($pesos, $cambio = 17.40) {
        if ($pesos < 0) throw new InvalidArgumentException("La cantidad de pesos no puede ser negativa");
        if ($cambio <= 0) throw new InvalidArgumentException("La tasa de cambio debe ser mayor a 0");
        return $pesos / $cambio;
    }

    public function dolaresAPesos($dolares, $cambio = 17.40) {
        if ($dolares < 0) throw new InvalidArgumentException("La cantidad de dolares no puede ser negativa");
        if ($cambio <= 0) throw new InvalidArgumentException("La tasa de cambio debe ser mayor a 0");
        return $dolares * $cambio;
    }
}

class ConversorTemperaturas {
    public function fahrenheitACelsius($fahrenheit) {
        if (!is_numeric($fahrenheit)) throw new InvalidArgumentException("La temperatura debe ser un número");
        return ($fahrenheit - 32) * 5 / 9;
    }

    public function celsiusAFahrenheit($celsius) {
        if (!is_numeric($celsius)) throw new InvalidArgumentException("La temperatura debe ser un número");
        return ($celsius * 9 / 5) + 32;
    }
}

class ConversorUnidades {
    public function kmAMillas($km) {
        if ($km < 0) throw new InvalidArgumentException("La cantidad de kilometros no puede ser negativa");
        return $km * 0.621371;
    }

    public function millasAKm($millas) {
        if ($millas < 0) throw new InvalidArgumentException("La cantidad de millas no puede ser negativa");
        return $millas / 0.621371;
    }
}

class CalculadoraDescuento {
    public function calcular($pre_og, $porcent) {
        if ($pre_og < 0) throw new InvalidArgumentException("El precio original no puede ser negativo");
        if ($porcent < 0 || $porcent > 100) throw new InvalidArgumentException("El porcentaje debe estar entre 0 y 100");
        $descuento = $pre_og * ($porcent / 100);
        return $pre_og - $descuento;
    }
}

class ValidadorEdad {
    public function esMayor($edad) {
        if ($edad < 0) throw new InvalidArgumentException("La edad no puede ser negativa");
        return $edad >= 18;
    }
}

class ValidadorNumeros {
    public function esPar($numero) {
        if (!is_int($numero)) throw new InvalidArgumentException("El número debe ser un entero");
        return $numero % 2 === 0;
    }

    public function esImpar($numero) {
        if (!is_int($numero)) throw new InvalidArgumentException("El número debe ser un entero");
        return $numero % 2 !== 0;
    }
}

class CalculadoraCalificaciones {
    public function calcularPromedio($cal1, $cal2, $cal3) {
        $calificaciones = [$cal1, $cal2, $cal3];
        
        foreach ($calificaciones as $cal) {
            if (!is_numeric($cal)) throw new InvalidArgumentException("Las calificaciones deben ser números");
            if ($cal < 0 || $cal > 100) throw new InvalidArgumentException("Las calificaciones deben estar entre 0 y 100");
        }
        
        $promedio = array_sum($calificaciones) / 3;
        $aprobado = $promedio >= 60;
        
        return [
            'promedio' => $promedio,
            'aprobado' => $aprobado
        ];
    }
}