<?php

namespace App\Transformers;

use Faker\Factory;
use Illuminate\Support\Collection;

class UserTransformer
{
    /**
     * @var Faker\Generator
     */
    protected $faker;

    /**
     * @var Illuminate\Database\Eloquent\Collection
     */
    protected $players;

    /**
     * @var int
     */
    protected $teamCount;

    /**
     * @var array
     */
    protected $teams;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * Accepts a collection of users and divides them into named teams.
     *
     * @param  Collection $players
     * @return Collection
     */
    public function getTeams($players): Collection
    {
        $this->players = $players->sortByDesc('ranking');

        $this->calculateTeamDynamics()
            ->assignTeamCaptains()
            ->assignPlayers();

        return $this->teams;
    }

    /**
     * Assigns remaining players to the existing teams.
     *
     * @return self
     */
    protected function assignPlayers(): self
    {
        $this->teams = $this->teams->sortBy('ranking');

        $this->players->each(function ($player) {
            $this->teams->first()['players']->push($player);
            $this->teams->first()['ranking'] += $player->ranking;

            $this->teams = $this->teams->sortBy('ranking');
        });

        return $this;
    }

    /**
     * Creates a collection for each team and assigns a goalie as team captain.
     *
     * @return self
     */
    protected function assignTeamCaptains(): self
    {
        $this->teams = collect();

        for ($i = 0; $i < $this->teamCount; $i++) {
            $this->players->each(function ($player, $key) {
                if ($player->can_play_goalie == false) {
                    return;
                }

                $countryCode = $this->faker->unique()->countryCode;

                $this->teams->push(collect([
                    'name'        => "Team {$countryCode}",
                    'countryCode' => strtolower($countryCode),
                    'ranking'     => $player->ranking,
                    'players'     => collect([$player]),
                ]));

                $this->players->forget($key);

                return false;
            });
        }

        return $this;
    }

    /**
     * Calculates the number of teams.
     *
     * @return self
     */
    protected function calculateTeamDynamics(): self
    {
        $teamCount = floor($this->players->count() / 18);

        if ($teamCount % 2 !== 0) {
            $teamCount -= 1;
        }

        $this->teamCount = $teamCount;

        return $this;
    }
}
