<?php

namespace App\Services;

use InvalidArgumentException;

class CalculadoraCalificaciones {
    
    public function calcularPromedio($cal1, $cal2, $cal3) {
        $calificaciones = [$cal1, $cal2, $cal3];
        
        foreach ($calificaciones as $cal) {
            if (!is_numeric($cal)) {
                throw new InvalidArgumentException("Las calificaciones deben ser números");
            }
            if ($cal < 0 || $cal > 100) {
                throw new InvalidArgumentException("Las calificaciones deben estar entre 0 y 100");
            }
        }
        
        $promedio = array_sum($calificaciones) / 3;
        $aprobado = $promedio >= 60;
        
        return [
            'promedio' => $promedio,
            'aprobado' => $aprobado
        ];
    }
}