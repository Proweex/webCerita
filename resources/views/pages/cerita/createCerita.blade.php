@extends('layouts.app')

@section('title', 'Buat Cerita Baru')

@section('content')

    {!! Form::open(['action'=> 'CeritaController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('judul', 'Judul')}}
            {{Form::text('judul', '', ['class' => 'form-control', 'placeholder' => 'Judul'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover', 'Cover')}}
            {{Form::text('cover', 'assets/coverImage/Cover_Image_Sementara.png', ['class' => 'form-control', 'placeholder' => 'Cover', 'readonly'])}}
        </div>
        {{Form::submit('Tambah', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection