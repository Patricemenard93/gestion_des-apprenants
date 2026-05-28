<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_homepage_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Gestion des apprenants');
    }
}
