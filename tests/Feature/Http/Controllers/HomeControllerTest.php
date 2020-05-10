<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed('UserSeeder');
    }

    /** @test */
    public function theHomepageIsShown()
    {
        $request = $this->get(route('home'));

        $request->assertStatus(200);
        $request->assertViewIs('home');
        $request->assertViewHas('teams');
    }
}
