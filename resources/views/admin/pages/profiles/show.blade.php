@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
    <h1><b>Detalhes do perfil</b>{{ $profile->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>
            </ul>
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PERFIL{{ $profile->name }}</button>
            </form>
        </div>
    <div>
@endsection
