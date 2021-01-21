<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ChangePasswordController extends Controller
{
    #Zorg direct dat de middeleware van auth er tussen zit
    public function __construct()   {
        $this->middleware("auth");
    }

    public function edit()  {
        #Zet de gegevens van de user in de var user
        $user = Auth::user(); 
        #return de view met de user gegevens
        return view("user.changePassword", compact('user'));
    }

    public function update(Request $request, $id)    {
        $this->validate($request, [
            "old_password" => "required",
            "password" => "required",
            "old_password" => "required|same:password"
        ]);

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route("home")->with("Succes", "Password changed");
    }
}
