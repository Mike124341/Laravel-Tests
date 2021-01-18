<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #Haal Data van de user op en zet in var user
        $user = Auth::user();
        #geef var user mee met de view door compact en dan de var
        #nu kan je de user var gebruiken in de html met {{}}
        return view('home', compact('user'));
    }
}
