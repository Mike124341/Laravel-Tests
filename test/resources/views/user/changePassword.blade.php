@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger"></div>
        <p><strong>Oeps!</strong> Er is iets fout gegaan </p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
@endif