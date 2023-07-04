@extends('base.app')

@section('conteudo')
    @php
        if (!empty($funcionario->id)) {
            $route = route('funcionario.update', $funcionario->id);
        } else {
            $route = route('funcionario.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Usuário')


<div class="col">
    <div class="row">
        <h1>Formulário de Cadastro de funcionário</h1>
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($funcionario->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($funcionario->id)) {{ $funcionario->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($funcionario->nome)) {{ $funcionario->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Telefone</label><br>
                <input type="text" class="form-control" name="telefone"
                    value="@if (!empty(old('telefone'))) {{ old('telefone') }} @elseif(!empty($funcionario->telefone)) {{ $funcionario->telefone }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">E-mail</label><br>
                <input type="email" class="form-control" name="email"
                    value="@if (!empty(old('email'))) {{ old('email') }} @elseif(!empty($funcionario->email)) {{ $funcionario->email }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Tipo de serviço</label><br>
                <select name="categoria_id" class="form-select">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label class="form-label">Data</label><br>
                <input type="date" class="form-control" name="data"
                    value="@if (!empty(old('data'))) {{ old('data') }} @elseif(!empty($funcionario->data)) {{ $funcionario->data }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <br>
                <label class="form-label">Imagem- Foto 3x4 do funcionário</label><br>
                <input type="file" name="imagem" class="form-control @error('imagem') is-invalid @enderror" />
                @error('imagem')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href="{{ route('funcionario.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
@endsection
