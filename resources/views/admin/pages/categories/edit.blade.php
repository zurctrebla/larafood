@extends('adminlte::page')

@section('title', "Editar a Categoria {$category->name}")

@section('content_header')
    <h1>Editar a Categoria {{ $category->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-board">
            <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@endsection
