@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <h1><a href="{{ route('usuario.index') }}" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i></a>
        Usuário</h1>
@stop

@section('content')
    <form action="{{ route('usuario.store') }}" method="POST" class="form" enctype="multipart/form-data">
        <div class="card card-body">
            @csrf
            @include('usuario._partials.form')
        </div>
    </form>
@stop
