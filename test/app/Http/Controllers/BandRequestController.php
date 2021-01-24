<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BandRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class BandRequestController extends Controller
{
    #Kijk of de huidig gebruiker openstaande requests heefd
    public function acceptRequest(User $user)  {
        $user = Auth::user();
        $current_user_requests = BandRequests::where('band_admin_name', $user->name)->where('band_admin_id', $user->id)->get();

        if($current_user_requests != '[]')  {
            #Update Band Van User Die De Request Heeft Verstuurd
            $updateBand = User::where('id', $current_user_requests[0]['request_sender_id'])->update(['user_band' => $current_user_requests[0]['request_join_band_name']] );

            $updateRequest = BandRequests::where('request_sender_id', $current_user_requests[0]['request_sender_id'])
            ->where('request_join_band_name', $current_user_requests[0]['request_join_band_name'])->update(['accepted' => TRUE]); 

            $deleteAcceptedRequests = BandRequests::where('accepted', TRUE)->delete();

            return redirect()->back()->with('success', 'U heeft een nieuwe band lid');
        }
        else{
            return back()->withErrors(['Foutmelding', 'U Heeft geen openstaande Band Verzoeken']);
        }
    }

    #Functie voor het wijgeren van de request
    public function declineRequest(User $user)    {
        $user = Auth::user();
        $current_user_requests = BandRequests::where('band_admin_name', $user->name)->where('band_admin_id', $user->id)->get();
        
        if($current_user_requests != '[]')  {
            $deleteAcceptedRequests = BandRequests::where('request_sender_id', $current_user_requests[0]['request_sender_id'])
            ->where('request_join_band_name', $current_user_requests[0]['request_join_band_name'])->delete();

            return redirect()->back()->with('success', 'U heeft het verzoek afgewezen');
        }
        else{
            return back()->withErrors(['Foutmelding', 'U Heeft geen openstaande Band Verzoeken']);
        }
    }
}
