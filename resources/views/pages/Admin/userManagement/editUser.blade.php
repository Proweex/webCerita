@extends('layouts.app')

@section('title', 'User Manager')

@section('content')

    <h1>User Manager -> Edit User</h1>
    {!! Form::open(['action'=> ['UserController@update', $user], 'method'=>'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nama', 'Nama')}}
            {{Form::text('nama', $user->name, ['class' => 'form-control', 'placeholder' => 'Nama'])}}
        </div>  
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@email.com'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'password'))}}
        </div>
        <div class="form-group">
            {{Form::label('foto', 'Foto Profil')}}<br>
            {{Form::file('foto')}}

        </div>
        {{Form::submit('Update Data', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}   

@endsection