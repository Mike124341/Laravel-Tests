@extends('layouts.app')

@section('content')
<!-- Check voor errors en laat zien -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p><strong>Oeps!</strong> Er is iets fout gegaan </p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::model($user, ['method' => 'GET', 'route' => ['updatepassword.update', $user->id]]) !!}
{{ method_field('PATCH') }}
<div class="row">
    <div class="col-lg-3">{!! Form::label('old_password', 'Oud wachtwoord: ') !!}</div>
    <div class="col-lg-3">{!! Form::password('old_password', ['class'=>'form-control']) !!}</div>
</div>
<div class="row">
    <div class="col-lg-3">{!! Form::label('password', 'Nieuw wachtwoord: ') !!}</div>
    <div class="col-lg-3">{!! Form::password('password', ['class'=>'form-control']) !!}</div>
</div>
<div class="row">
    <div class="col-lg-3">{!! Form::label('password_confirmation', 'Herhaal wachtwoord: ') !!}</div>
    <div class="col-lg-3">{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}</div>
</div>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-3"><button type="submit" class="btn btn-primary">Opslaan</button></div>
</div>

{!! Form::close() !!}

@endsection