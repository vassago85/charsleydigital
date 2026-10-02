<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_work_pages_are_public(): void
    {
        $this->get('/work')->assertOk();

        foreach (config('work.projects') as $project) {
            $this->get('/work/'.$project['slug'])
                ->assertOk()
                ->assertSee($project['name']);
        }

        $this->get('/work/not-a-project')->assertNotFound();
    }
}
