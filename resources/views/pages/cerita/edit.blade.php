@extends('layouts.app')

@section('title', 'Edit Judul Cerita')

@section('content')

    {!! Form::open(['action'=> ['CeritaController@update', $idCerita], 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('judul', 'Judul')}}
            {{Form::text('judul', $judul, ['class' => 'form-control', 'placeholder' => 'Judul'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover', 'Cover')}}
            {{Form::text('cover', 'assets/coverImage/Cover_Image_Sementara.png', ['class' => 'form-control', 'placeholder' => 'Cover', 'readonly'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection