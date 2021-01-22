@extends('layouts.app')

@section('content')
<!-- voor test {{$user}} -->

<!--- Pop Up HTML voor het veranderen van jouw persoonlijke kleuren -->
<div class="modal fade bd-example-modal-lg" id="colorchange_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="/cssupdate" method="post">
        @csrf
        <label for="achtergrond">Kies een achtergronds kleur:</label>
        <input type="color" value="#ff0000" name="achtergrondkleur" id="achtergrond">

        <label for="tekst">Kies een tekst kleur:</label>
        <input type="color" value="#ff0000" name="tekstkleur" id="tekst">

        <button type="submit" class="btn btn-warning">verander</button>
      </form>
    </div>
  </div>
</div>

<!-- Hier komt de code voor de pop up waarmee je jouw wachtwoord veranderd -->
<div class="modal fade bd-example-modal-lg" id="passchange_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-horizontal" action="/passupdate" method="post">
        @csrf
        <div class="form-group">
          <label class="control-label col-sm-2" for="og_pass">Orginele wachtwoord:</label>
          <div class="col-sm-10">
            <input type="password" placeholder="Huidig wachtwoord" class="form-control" name="og_pass" id="og_pass">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="new_pass">Nieuw wachtwoord:</label>
          <div class="col-sm-10">
            <input type="password" placeholder="Nieuwe wachtwoord" class="form-control" name="new_pass" id="new_pass">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="confirm_pass">Herhaal wachtwoord:</label>
          <div class="col-sm-10">
            <input type="password" placeholder="Herhaal wachtwoord" class="form-control" name="confirm_pass" id="confirm_pass">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning">verander</button>
          </div>
        </div>
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
                <!-- Begin user gegevens en buttons-->
                    <h5>Gebruiker gegevens</h5>
                    <ul>
                        <li>Gebruikers ID: {{$user->id}}</li>
                        <li>Gebruikers Naam: {{$user->name}}</li>
                        <li>Gebruikers E-mail: {{$user->email}}</li>
                        <br>
                        <!-- Pop up knop hier onder-->
                        <li><button type="button" id="pop-up-1" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#colorchange_modal">
                          Verander kleuren
                        </button></li>
                        <li><button type="button" id="pop-up-2" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#passchange_modal">
                          Verander wachtwoord
                        </button></li>
                    </ul>
                <!-- Einde User Gegevens En Buttons -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
