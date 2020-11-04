@extends('layouts.app')

@section('title', $judul)

@section('content')
    <a href="/c/{{$idCerita}}" class="btn btn-default">Kembali</a>

    {!! Form::open(['action'=> ['CeritaController@store', $idCerita, $nomorJilid], 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('judul', 'Judul')}}
            {{Form::text('judul', $judulCerita, ['class' => 'form-control', 'placeholder' => 'Judul', 'readonly'])}}
        </div>  
        <div class="form-group">
            {{Form::label('jilid', 'Jilid')}}
            {{Form::text('jilid', $nomorJilid, ['class' => 'form-control', 'placeholder' => 'Jilid', 'readonly'])}}
        </div>
        <div class="form-group">
            {{Form::label('nomorBab', 'Nomor Bab')}}
            {{Form::text('nomorBab', $nomorBab, ['class' => 'form-control', 'placeholder' => 'Nomor Bab', 'readonly'])}}
        </div>
        <div class="form-group">
            {{Form::label('judulBab', 'Judul Bab')}}
            {{Form::text('judulBab', '', ['class' => 'form-control', 'placeholder' => 'Judul Bab'])}}
        </div>
    {!! Form::close() !!}   
@endsection