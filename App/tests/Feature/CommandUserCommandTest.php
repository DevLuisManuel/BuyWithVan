<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use RuntimeException;
use Tests\TestCase;

class CommandUserCommandTest extends TestCase
{
    public function test_command_get_all_data_successful_response(): void
    {
        $this->artisan("user:command")
            ->expectsOutput("Usuarios migrados correctamente.")
            ->doesntExpectOutput("No se encontro usuarios a migrar, verifique e intente nuevamente.")
            ->assertExitCode(0);
    }
}
