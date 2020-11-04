@extends('layouts.app')

@section('title', 'User Manager')

@section('content')

    <h1>User Manager -> Add User</h1>
    {!! Form::open(['action'=> 'UserController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nama', 'Nama')}}
            {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama'])}}
        </div>  
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'example@email.com'])}}
        </div>
        <div class="form-group">
            Password <br>
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'password'))}}
        </div>
        <div class="form-group">
            Foto Profil<br>
            {{Form::file('foto')}}

        </div>
        {{Form::submit('Tambah User', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}   

@endsection