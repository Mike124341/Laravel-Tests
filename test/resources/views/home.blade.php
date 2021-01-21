@extends('layouts.app')

@section('content')
{{$user}}
<!--- Pop Up HTML word niet geshowed door de modal mudele van bootsrap alleen als je op de knop drukt -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

<!-- Begin gebruikers data section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Dashboard') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Gebruiker gegevens</h5>
                    <ul>
                        <li>Gebruikers ID: {{$user->id}}</li>
                        <li>Gebruikers Naam: {{$user->name}}</li>
                        <li>Gebruikers E-mail: {{$user->email}}</li>
                        <br>
                        <!-- Pop up knop hier onder-->
                        <li><button type="button" id="pop-up-1" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Verander tekst kleur</button></li>
                        <li><button type="button" class="btn btn-outline-warning btn-sm" href="/updatepassword"><a href="/updatepassword">Verander wachtwoord</a></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
