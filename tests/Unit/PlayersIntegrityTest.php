<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PlayersIntegrityTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed('UserSeeder');
    }

    /** @test */
    public function goaliePlayersExist()
    {
        $goalieCount = User::players()->where('can_play_goalie', true)->count();

        $this->assertTrue($goalieCount > 1);
    }

    /** @test */
    public function atLeastOneGoaliePlayerPerTeam()
    {
        $players            = User::players()->get();
        $goalies            = $players->where('can_play_goalie', true);
        $maximumTeamCount   = ceil($players->count() / 18);
        $suitableTeamMakeup = false;

        for ($i = 1; $i <= $maximumTeamCount; $i++) {
            if (
                ($i % 2 == 0)                     // Ensure an even number of teams
                && ($players->count() / $i >= 18) // Ensure teams have no less than the minimum players.
                && ($players->count() / $i <= 22) // Ensure teams have no more than the maximum players.
                && ($i <= $goalies->count())      // Ensure enough goalies for each team.
            ) {
                $suitableTeamMakeup = true;
            }
        }

        $this->assertTrue($suitableTeamMakeup);
    }
}
