<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BandRequests;

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
        $band_requests = BandRequests::where('band_admin_name', $user->name)->where('band_admin_id', $user->id)->get();

        return view('home', compact('user', 'band_requests'));
    }
}
