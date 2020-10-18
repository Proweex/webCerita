@extends('layouts.app')

@section('title', 'List Cerita')

@section('content')
    <h1>List Cerita</h1>

    @if(count($cerita) > 0)
        @foreach ($cerita as $satuCerita)
            <div class="card card-body bg-light">
            <h3><a href="c/{{$satuCerita->id}}">{{$satuCerita->judulCerita}}</a></h3>
                <small>ditulis pada tanggal {{$satuCerita->created_at}}</small>
            </div>
        @endforeach
    @else
        <br>
        <p>Belum ada cerita</p>
    @endif
    
    <a href="cerita/create" class="btn btn-default">Buat Cerita</a>

@endsection