@extends('layouts.app')

@section('title', $judul)

@section('content')
    <a href="/c/{{$idCerita}}/{{$nomorJilid}}" class="btn btn-default">Kembali</a>

    <h1>{{$judul}}</h1>
    <h2>Jilid ke-{{$nomorJilid}}</h2>
    <h3>Bab {{$bab}} : {{$judulBab}}</h3>
    <small>ditulis pada tanggal {{$tanggalDibuat}}</small>

    <div class="card">
        <div>
            {{$text}}
        </div>
    </div>

@endsection