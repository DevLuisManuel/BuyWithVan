<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCommandTest extends TestCase
{
    public function test_get_all_posts_response_successful()
    {
        $this->artisan("post:command")
            ->expectsOutput("Posts migrados correctamente.")
            ->doesntExpectOutput("No se encontro Posts a migrar, verifique e intente nuevamente.");
    }

    public function test_command_with_arguments()
    {
        $this->artisan("post:command -C")
            ->expectsOutput("Data almacenada con exito")
            ->doesntExpectOutput("Error tratando de almacenar el comentario")
            ->assertExitCode(0);
    }
}
