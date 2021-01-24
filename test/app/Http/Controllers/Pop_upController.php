<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bands;
use App\Models\BandRequests;

class Pop_upController extends Controller
{
    #Hier komt de functie voor het updaten van de pagina kleur
    public function updateColor(Request $request, User $user)   {

        #pak current user ID -lange manier- 
        $user = Auth::user();
        $id = $user->id;

        #variable komt de input in te staan tweede argument is voor als niet is ingevoerd
        #LET OP Straks moet hier de kleur van uit de DATABASE komen
        $achtergrondColor = $request->input('achtergrondkleur') ?: $user->achtergrondKleur;
        $tekstColor = $request->input('tekstkleur') ?: $user->tekstKleur;

        #Update kleur in de data base
        $colors = User::where('id', $id)->update(
            ['achtergrondKleur' => $achtergrondColor, 'tesktKleur' => $tekstColor] );

        return redirect()->back()->with('success', 'Kleur(en) veranderd');;
    }

    #Deze functie zorgt dat je jouw wachtwoord kan veranderen
    #Door middel van de pop up in de Dashbord als je bent ingelogd
    public function changePassword(Request $request, User $user)    {
        
        $this->validate($request, [
            'og_pass' => 'required',
            'new_pass' => 'required|min:8',
            'confirm_pass' => 'required|same:new_pass',
        ], [    #Custom error messages
            'og_pass.required' => 'Orginele wachtwoord niet ingevuld',
            'new_pass.required' => 'nieuwe wachtwoord niet ingevuld',
            'confirm_pass.required' => 'wachtwoord niet herhaald',
            'confirm_pass.same' => 'wachtwoorden zijn niet hetzelfe',
            'new_pass.min' => 'wachtwoord moet minimaal 8 tekens zijn',
        ]);
        
        $user = Auth::user();

        #Check of de ingevoerde orginele wachtwoord over een komt
        #Met de orginele wachtwoord uit de database
        if(Hash::check($request->input('og_pass'), $user->password))    {
            #Check of de nieuwe wacht woord het zelfde is als de bestaande
            if(Hash::check($request->input('new_pass'), $user->password))   {
                return back()->withErrors(['Foutmelding', 'Uw nieuwe wachtwoord kan niet hetzelfde zijn als de bestaande']);
            }
        } 
        #als de orginele en de huide niet overeen komen
        else {return back()->withErrors(['Foutmelding', 'uw orginele wachtwoord komt niet overeen']);}

        $user->password = bcrypt($request->input('new_pass'));
        $user->save();
        return redirect()->back()->with('success', 'Wachtwoord veranderd');
    }

    #Hier de code voor het versturen van een request voor het joinen van een band
    public function sent_band_request(Request $request, User $user) {

        $this->validate($request, ['band_request_join' => 'required',] , ['band_request_join.required' => 'Geen Band Naam Ingevoerd']);

        $band_requested_admin = Bands::where('band_name', $request->input('band_request_join'))->get();   //Slaat de band admin op in de var
        $band_requested_adminID = User::where('name', '=', $band_requested_admin[0]['band_admin'])->where('user_band', '=', $request->input('band_request_join'))->get();

        $user = Auth::user();

        $insert_data_join_request = array(
            'band_admin_name' => $band_requested_admin[0]['band_admin'],
            'band_admin_id' => $band_requested_adminID[0]['id'],
            'request_sender_namde' => $user->name,
            'request_sender_id' => $user->id,
            'request_join_band_name' => $request->input('band_request_join'),
            'accepted' => FALSE,
            'created_at' => date("Y-m-d H:i:s"),
        );

        BandRequests::insert($insert_data_join_request);

        return redirect()->back()->with('success', 'Uw verzoek is verstuurd');
    }
}