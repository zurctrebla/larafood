@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <h1>Cadastrar Nova Permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-board">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
