@extends('adminlte::page')

@section('title', "Detalhes da categoria {$category->name}")

@section('content_header')
    <h1><b>Detalhes da categoria</b>{{ $category->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $category->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $category->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR A CATEGORIA {{ $category->name }}</button>
            </form>
        </div>
    <div>
@endsection
