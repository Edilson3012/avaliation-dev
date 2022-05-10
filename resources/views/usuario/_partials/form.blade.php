@include('_components.alerts')
@include('_components.components')

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome"
        value="{{ $usuario->name ?? old('name') }}">
</div>

<div class="form-group">
    <label>Data Nascimento:</label>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
            </span>
        </div>
        <input type="date" class="form-control float-right" name="birthday"
            value="{{ $usuario->birthday ?? old('birthday') }}">
    </div>
</div>

@if (isset($usuario->image))
    <ul class="list-inline">
        <li class="list-inline-item">
            <img alt="{{ $usuario->name }}" class="table-avatar" src="{{ url("storage/{$usuario->image}") }}"
                style="max-width: 350px;max-height: 100px;">
        </li>
    </ul>
@endif

<div class="form-group">
    <label for="image">Imagem</label>
    <div class="input-group">
        <div class="custom-file">
            <button class="btn btn-info col-sm-12">
                <input type="file" class="form-control-file" id="image" name="image">
            </button>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>
