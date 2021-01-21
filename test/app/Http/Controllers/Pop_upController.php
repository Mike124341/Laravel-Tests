<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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

        return redirect()->route('home');
    }
}
