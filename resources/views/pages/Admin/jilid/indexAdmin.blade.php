@extends('layouts.app')

@section('title', $judul)

@section('content')
    <h1>{{$judul}}</h1>

    @if(count($jilid) > 0)
        @foreach ($jilid as $listJilid)
            <div class="card card-body bg-light">
            <h3><a href="/m/c/{{$idCerita}}/{{$listJilid->id}}">Jilid ke-{{$listJilid->nomorJilid}}</a></h3>
                <small>ditulis pada tanggal {{$listJilid->created_at}}</small>
            </div>
        @endforeach
    @else
        <br>
        <p>Belum ada jilid</p>
    @endif
@endsection