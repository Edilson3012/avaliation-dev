@extends('adminlte::page')

@section('content_header')
    <h1><a href="{{ route('usuario.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>Usuários</h1>
@stop

@section('content')
    @include('_components.alerts')
    @include('_components.components')

    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th style="text-align: center; width: 15%;">Ações</th>
                </thead>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="{{ $usuario->name }}" class="table-avatar"
                                        src="{{ url("storage/{$usuario->image}") }}"
                                        style="max-width: 72px;max-height: 80px;">
                                </li>
                            </ul>
                        </td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ formatDateAndTime($usuario->birthday, 'd/m/Y') }}</td>
                        <td style="margin-right: 50px">
                            <div class="form-group">

                                <a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-primary "><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-warning "><i
                                        class="fas fa-edit"></i></a>

                                <button class="btn btn-danger" onclick="deleteConfirmation('{{ $usuario->id }}')"><i
                                        class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($usuarios->count() === 0)
                    <td>
                        Nenhum usuário cadastrado.
                    </td>
                @endif
            </table>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function deleteConfirmation(id) {
        Swal.fire({
            title: "Vai excluir mesmo?",
            text: "Deseja realmente excluir este registro?",
            icon: "warning",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Sim, tenho certeza!",
            cancelButtonText: "Ops, vou não!",
            reverseButtons: !0
        }).then(function(e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'DELETE',
                    url: `/usuario/${id}`,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        if (results.success === true) {
                            Swal.fire('Feito!', results.message, 'success');
                            location.reload();
                        } else {
                            Swal.fire('Ops!', results.message, 'error');
                        }
                    }
                });
            } else {
                iziToast.info({
                    title: 'INFO',
                    message: 'Registro não foi excluído.',
                    icon: '',
                    iconText: '',
                    iconColor: '',
                    iconUrl: null,
                    position: 'topRight',
                });
            }

        }, function(dismiss) {
            return false;
        })
    }
</script>
