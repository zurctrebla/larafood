@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <h1>Cadastrar Novo Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-board">
            <form action="{{ route('users.store') }}" class="form" method="POST">
                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
