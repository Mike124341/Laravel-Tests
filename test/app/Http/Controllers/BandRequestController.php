<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BandRequests;
use Illuminate\Support\Facades\Auth;


class BandRequestController extends Controller
{
    #Kijk of de huidig gebruiker openstaande requests heefd
    public function checkUser_Request()  {
        $user = Auth::user();
        $band_requests = BandRequests::where('band_admin_name', $user->name)->where('band_admin_id', $user->id)->get();
        
        return view('home', compact('user', 'band_requests'));
    }
}
