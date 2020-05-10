<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = json_decode(Storage::get('user-seed-data.json'), true);

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
