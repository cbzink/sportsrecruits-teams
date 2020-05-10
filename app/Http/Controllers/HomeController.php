<?php

namespace App\Http\Controllers;

use App\User;
use App\Transformers\UserTransformer;

class HomeController extends Controller
{
    /**
     * @var UserTransformer
     */
    protected $userTransformer;

    public function __construct()
    {
        $this->userTransformer = new UserTransformer;
    }

    public function index()
    {
        $teams = $this->userTransformer->getTeams(
            User::players()->get()
        );

        return view('home')
            ->withTeams($teams);
    }
}
