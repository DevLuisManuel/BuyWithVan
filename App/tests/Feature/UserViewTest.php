<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_successful(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
