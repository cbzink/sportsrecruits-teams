<?php

namespace Tests\Unit\Transformers;

use App\User;
use Tests\TestCase;
use App\Transformers\UserTransformer;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTransformerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var array
     */
    protected $teams;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed('UserSeeder');

        $this->teams = (new UserTransformer)->getTeams(User::players()->get());
    }

    /** @test */
    public function anEqualNumberOfTeamsIsGenerated()
    {
        $this->assertTrue(count($this->teams) % 2 == 0);
    }

    /** @test */
    public function eachTeamHasAtLeastOneGoalie()
    {
        foreach ($this->teams as $team) {
            $this->assertTrue($team['players']->where('can_play_goalie', true)->count() >= 1);
        }
    }

    /** @test */
    public function eachTeamHasAnAcceptableNumberOfPlayers()
    {
        foreach ($this->teams as $team) {
            $this->assertTrue($team['players']->count() >= 18);
            $this->assertTrue($team['players']->count() <= 22);
        }
    }
}
