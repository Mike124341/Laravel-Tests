@extends('layouts.app')

@section('content')
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
                        <li><a href="">Verander wachtwoord</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
