@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Home</h1>

    {{-- @if(count($cerita) > 0)
        @foreach ($cerita as $satuCerita)
            <div class="well">
            <h3><a href="/c/{{$satuCerita->id}}">{{$satuCerita->judulCerita}}</a></h3>
                <small>ditulis pada tanggal {{$satuCerita->created_at}}</small>
            </div>
        @endforeach
    @else
        <br>
        <p>Belum ada cerita</p>
    @endif --}}
    summarry dari web<br>
    Link to list cerita <br>

@endsection