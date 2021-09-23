@extends('adminlte::page')

@section('title', "Editar o perfil {$profile->name}")

@section('content_header')
    <h1>Editar o Perfil {{ $profile->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="class card-board">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@endsection
