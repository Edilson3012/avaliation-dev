@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <h1>
        <a href="{{ route('usuario.index') }}" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i></a>
        Visualizar Usuário - {{ $usuario->name }}
    </h1>
@stop

@section('content')
    <div class="card card-body">
        <table class="table table-striped">
            <thead>
                <th>Imagem</th>
                <th>Nome Usuário</th>
                <th>Dt. Nascimento</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img alt="{{ $usuario->name }}" class="table-avatar"
                            src="{{ url("storage/{$usuario->image}") }}" style="max-width: 72px;max-height: 80px;">
                    </td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ formatDateAndTime($usuario->birthday) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@stop
