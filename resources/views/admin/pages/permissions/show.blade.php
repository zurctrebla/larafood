@extends('adminlte::page')

@section('title', "Detalhes da permissão {$permission->name}")

@section('content_header')
    <h1><b>Detalhes da permissão</b>{{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>
            </ul>
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR A PERMISSÃO{{ $permission->name }}</button>
            </form>
        </div>
    <div>
@endsection
