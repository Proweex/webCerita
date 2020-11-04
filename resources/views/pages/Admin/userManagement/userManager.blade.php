@extends('layouts.app')

@section('title', 'User Manager')

@section('content')

    <h1>User Manager</h1>
    <a href="/m/user-manager/create" class="btn btn-primary">Tambah</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Id User</th>
                <th scope="col">Foto Profil</th>
                <th scope="col">email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            
            @for ($i = 0; $i < $userCount; $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$user[$i]->id}}</td>
                    <td>
                        <img style="width:50px" src="/storage/assets/foto_profil/{{$user[$i]->foto_profile}}">
                    </td>
                    <td>{{$user[$i]->email}}</td>
                    <td>
                        <a href="/m/user-manager/{{$user[$i]->id}}/edit" class="btn btn-primary">Edit</a>
                        {!! Form::open(['action'=> ['UserController@destroy', $user[$i]->id], 'method'=>'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Hapus', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>    
            @endfor

        </tbody>
      </table>

@endsection