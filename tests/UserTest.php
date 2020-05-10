<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function queriesCanBeScopedToPlayers()
    {
        $playerUser = factory(\App\User::class)->create(['user_type' => 'player']);
        $coachUser  = factory(\App\User::class)->create(['user_type' => 'coach']);

        $results = User::players()->get();

        $this->assertTrue($results->first()->is($playerUser));
        $this->assertTrue($results->count() == 1);
    }
}
