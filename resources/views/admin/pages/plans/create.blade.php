@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-board">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
