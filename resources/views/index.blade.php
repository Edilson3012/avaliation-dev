@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="">
            <div class="row">
                <h1 class="">Dashboard</h1>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $usuario }}</h3>
                        <p>Qtd Usuários</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ route('usuario.index') }}" class="small-box-footer">Acessar <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
