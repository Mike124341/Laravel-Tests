@extends('layouts.app')

@section('content')
{{$user}}

<!--- Pop Up HTML word niet geshowed door de modal mudele van bootsrap alleen als je op de knop drukt -->
<div class="modal fade bd-example-modal-lg" id="colorchange_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="/cssupdate" method="post">
        @csrf
        <label for="achtergrond">Kies een achtergronds kleur:</label>
        <input type="text" name="achtergrondkleur" id="achtergrond">

        <label for="tekst">Kies een tekst kleur:</label>
        <input type="text" name="tekstkleur" id="tekst">

        <button type="submit" class="btn btn-warning">verander</button>
      </form>
    </div>
  </div>
</div>

<!-- HIer komt de code voor de pop up waarmee je jouw wachtwoord veranderd -->
<div class="modal fade bd-example-modal-lg" id="passchange_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="/passupdate" method="post">
        @csrf
        <label for="og_pass">Orginele wachtwoord:</label>
        <input type="password" name="og_pass" id="og_pass">

        <label for="new_pass">Nieuw wachtwoord:</label>
        <input type="password" name="new_pass" id="new_pass">

        <label for="confirm_pass">Herhaal wachtwoord:</label>
        <input type="password" name="confirm_pass" id="confirm_pass">

        <button type="submit" class="btn btn-warning">verander</button>
      </form>
    </div>
  </div>
</div>


<!-- Begin gebruikers data section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Dashboard') }}</h3></div>

                <div class="card-body">
                <!-- Error displaty -->
                    @if ($errors->any())
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>

                      @foreach($errors->all() as $error)
                      {{ $error }}<br/>
                      @endforeach
                      </div>
                    @endif
                <!-- error display einde -->

                <!-- Message -->
                  @if (\Session::has('success'))
                    <div class="alert alert-success">
                      <ul>
                        <li>{!! \Session::get('success') !!}</li>
                      </ul>
                    </div>
                  @endif
                <!-- Einde message -->
                    <h5>Gebruiker gegevens</h5>
                    <ul>
                        <li>Gebruikers ID: {{$user->id}}</li>
                        <li>Gebruikers Naam: {{$user->name}}</li>
                        <li>Gebruikers E-mail: {{$user->email}}</li>
                        <br>
                        <!-- Pop up knop hier onder-->
                        <li><button type="button" id="pop-up-1" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#colorchange_modal">
                          Verander tekst kleur
                        </button></li>
                        <li><button type="button" id="pop-up-2" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#passchange_modal">
                          Verander wachtwoord
                        </button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
