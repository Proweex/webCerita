@extends('layouts.app')

@section('title', 'Buat Cerita Baru')

@section('content')

    {!! Form::open(['action'=> 'JilidController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('judul', 'Judul')}}
            {{Form::text('judul', $judulCerita, ['class' => 'form-control', 'placeholder' => 'Judul', 'readonly'])}}
        </div>  
        <div class="form-group">
            {{Form::label('jilid', 'Jilid')}}
            {{Form::text('jilid', $jilid, ['class' => 'form-control', 'placeholder' => 'Jilid', 'readonly'])}}
        </div>
        {{Form::submit('Tambah', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection