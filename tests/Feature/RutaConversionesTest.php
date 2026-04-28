<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RutaConversionesTest extends TestCase
{
    /**
     * Prueba básica para verificar que la página principal funciona (código 200).
     */
    public function test_la_pagina_principal_carga_correctamente()
    {
        // Simulamos que el navegador entra a la ruta '/'
        $response = $this->get('/');

        // Afirmamos que el servidor responde con un estado HTTP 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Prueba para verificar que la página de bienvenida de Laravel
     * contiene cierto texto esperado.
     */
    public function test_la_pagina_principal_muestra_documentacion()
    {
        $response = $this->get('/');

        // Afirmamos que el HTML de la página contiene la palabra "Documentation"
        $response->assertSee('Documentation');
    }
}