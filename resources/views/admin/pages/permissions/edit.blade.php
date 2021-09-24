@extends('adminlte::page')

@section('title', "Editar a permissão {$permission->name}")

@section('content_header')
    <h1>Editar a permissão {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-board">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
