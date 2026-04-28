<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use App\Services\CalculadoraBasica;

class CalculadoraBasicaTest extends TestCase
{
    private $calc;

    protected function setUp(): void
    {
        $this->calc = new CalculadoraBasica();
    }

    public function test_suma_valida()
    {
        $this->assertEquals(10, $this->calc->sumar(7, 3));
    }

    public function test_resta_valida()
    {
        $this->assertEquals(4, $this->calc->restar(7, 3));
    }

    public function test_multiplicacion_valida()
    {
        $this->assertEquals(21, $this->calc->multiplicar(7, 3));
    }

    public function test_division_exacta()
    {
        $this->assertEqualsWithDelta(5.0, $this->calc->dividir(10, 2), 0.01);
    }

    public function test_division_con_decimal()
    {
        $this->assertEqualsWithDelta(3.5, $this->calc->dividir(7, 2), 0.01);
    }

    public function test_division_entre_cero_lanza_error()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("No se puede dividir entre cero");
        $this->calc->dividir(10, 0);
    }

    public function test_argumento_invalido_lanza_error()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->sumar(5, "letra");
    }
}