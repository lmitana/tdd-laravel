<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \PHPUnit\Framework\Attributes\Test as Test;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    #[Test]
    public function a_user_can_create_a_project(): void
    {
        //$response = $this->get('/');

        //$response->assertStatus(200);
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph()
        ];

        $this->post('/projects', $attributes);

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }
}
