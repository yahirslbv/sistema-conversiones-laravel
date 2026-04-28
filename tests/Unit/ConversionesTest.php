<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use App\ConversorMonedas;
use App\ConversorTemperaturas;
use App\ConversorUnidades;
use App\CalculadoraDescuento;
use App\ValidadorEdad;
use App\ValidadorNumeros;
use App\CalculadoraCalificaciones;

class ConversionesTest extends TestCase
{
    public function test_pesos_a_dolares_basico()
    {
        $conversor = new ConversorMonedas();
        $this->assertEqualsWithDelta(10.0, $conversor->pesosADolares(174), 0.01);
    }

    public function test_pesos_a_dolares_excepcion_negativo()
    {
        $conversor = new ConversorMonedas();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("negativa");
        $conversor->pesosADolares(-100);
    }

    public function test_dolares_a_pesos_basico()
    {
        $conversor = new ConversorMonedas();
        $this->assertEqualsWithDelta(174.0, $conversor->dolaresAPesos(10), 0.01);
    }

    public function test_dolares_a_pesos_excepcion_cambio_cero()
    {
        $conversor = new ConversorMonedas();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("mayor a 0");
        $conversor->dolaresAPesos(10, 0);
    }

    public function test_fahrenheit_a_celsius()
    {
        $conversor = new ConversorTemperaturas();
        $this->assertEqualsWithDelta(0.0, $conversor->fahrenheitACelsius(32), 0.01);
    }

    public function test_celsius_a_fahrenheit()
    {
        $conversor = new ConversorTemperaturas();
        $this->assertEqualsWithDelta(212.0, $conversor->celsiusAFahrenheit(100), 0.01);
    }

    public function test_temperatura_excepcion_tipo_invalido()
    {
        $conversor = new ConversorTemperaturas();
        $this->expectException(InvalidArgumentException::class);
        $conversor->fahrenheitACelsius("caliente");
    }

    public function test_km_a_millas()
    {
        $conversor = new ConversorUnidades();
        $this->assertEqualsWithDelta(62.1371, $conversor->kmAMillas(100), 0.001);
    }

    public function test_millas_a_km_excepcion_negativa()
    {
        $conversor = new ConversorUnidades();
        $this->expectException(InvalidArgumentException::class);
        $conversor->millasAKm(-5);
    }

    public function test_calculo_descuento_valido()
    {
        $calc = new CalculadoraDescuento();
        $this->assertEquals(100.0, $calc->calcular(200, 50));
    }

    public function test_descuento_porcentaje_fuera_de_rango()
    {
        $calc = new CalculadoraDescuento();
        $this->expectException(InvalidArgumentException::class);
        $calc->calcular(100, 150);
    }

    public function test_es_mayor_de_edad()
    {
        $validador = new ValidadorEdad();
        $this->assertTrue($validador->esMayor(18));
        $this->assertFalse($validador->esMayor(17));
    }

    public function test_edad_negativa()
    {
        $validador = new ValidadorEdad();
        $this->expectException(InvalidArgumentException::class);
        $validador->esMayor(-1);
    }

    public function test_par_impar_valido()
    {
        $validador = new ValidadorNumeros();
        $this->assertTrue($validador->esPar(4));
        $this->assertTrue($validador->esImpar(5));
    }

    public function test_numero_tipo_invalido()
    {
        $validador = new ValidadorNumeros();
        $this->expectException(InvalidArgumentException::class);
        $validador->esPar("dos");
    }

    public function test_promedio_aprobado()
    {
        $calc = new CalculadoraCalificaciones();
        $resultado = $calc->calcularPromedio(70, 80, 90);
        $this->assertEquals(80.0, $resultado['promedio']);
        $this->assertTrue($resultado['aprobado']);
    }

    public function test_promedio_reprobado()
    {
        $calc = new CalculadoraCalificaciones();
        $resultado = $calc->calcularPromedio(30, 40, 50);
        $this->assertEquals(40.0, $resultado['promedio']);
        $this->assertFalse($resultado['aprobado']);
    }

    public function test_calificaciones_fuera_de_rango()
    {
        $calc = new CalculadoraCalificaciones();
        $this->expectException(InvalidArgumentException::class);
        $calc->calcularPromedio(110, 80, 90);
    }
}