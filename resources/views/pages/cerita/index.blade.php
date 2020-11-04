@extends('layouts.app')

@section('title', 'List Cerita')

@section('content')
    <h1>List Cerita</h1>

    @if(count($cerita) > 0)
        @foreach ($cerita as $satuCerita)
            <div class="card card-body bg-light">
            <h3><a href="c/{{$satuCerita->id}}">{{$satuCerita->judulCerita}}</a></h3>
                <small>ditulis pada tanggal {{$satuCerita->created_at}}</small>
                
                {{-- Edit Button --}}
                <a href="/cerita/{{$satuCerita->id}}/edit" class="btn btn-default">Edit</a>

                {{-- Delete Button --}}
                {!!Form::open(['action' => ['CeritaController@destroy', $satuCerita->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Hapus', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}

            </div>
        @endforeach
    @else
        <br>
        <p>Belum ada cerita</p>
    @endif
    
    <a href="cerita/create" class="btn btn-default">Buat Cerita</a>
    
@endsection