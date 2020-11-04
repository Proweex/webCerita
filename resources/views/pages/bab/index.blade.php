@extends('layouts.app')

@section('title', $judul)

@section('content')
<a href="/c/{{$idCerita}}" class="btn btn-default">Kembali</a>
    <h1>{{$judul}}</h1>
    <h2>Jilid ke-{{$nomorJilid}}</h2>

    @if(count($bab) > 0)
        @foreach ($bab as $listBab)
            <div class="card card-body bg-light">
                <h3><a href="/c/{{$idCerita}}/{{$nomorJilid}}/{{$listBab->nomorBab}}">Bab {{$listBab->nomorBab}} : {{$listBab->judulBab}}</a></h3>
                <small>ditulis pada tanggal {{$listBab->created_at}}</small>
            </div>
        @endforeach
    @else
        <br>
        <p>Belum ada Bab</p>
    @endif

        <a href="/m/{{$idCerita}}/{{$nomorJilid}}/bab/create" class="btn btn-default">Tambah Bab</a>

@endsection