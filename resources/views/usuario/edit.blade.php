@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1><a href="{{ route('usuario.index') }}" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i></a>
        Usuário
    </h1>
@stop

@section('content')
    <div class="card card-body">
        <form action="{{ route('usuario.update', $usuario->id) }}" method="POST" class="form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('usuario._partials.form')
        </form>
    </div>
@stop
