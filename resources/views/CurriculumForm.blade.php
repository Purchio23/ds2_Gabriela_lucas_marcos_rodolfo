@extends('base.app')

@section('conteudo')
    @php
        if (!empty($curriculum->id)) {
            $route = route('curriculum.update', $curriculum->id);
        } else {
            $route = route('curriculum.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Usuário')

<h1>Formulário de Currículo a curriculum</h1>

<div class="col">
    <div class="row">
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($curriculum->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($curriculum->id)) {{ $curriculum->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($curriculum->nome)) {{ $curriculum->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Telefone</label><br>
                <input type="text" class="form-control" name="telefone"
                    value="@if (!empty(old('telefone'))) {{ old('telefone') }} @elseif(!empty($curriculum->telefone)) {{ $curriculum->telefone }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">E-mail</label><br>
                <input type="email" class="form-control" name="email"
                    value="@if (!empty(old('email'))) {{ old('email') }} @elseif(!empty($curriculum->email)) {{ $curriculum->email }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Idade</label><br>
                <input type="text" class="form-control" name="idade"
                    value="@if (!empty(old('idade'))) {{ old('idade') }} @elseif(!empty($curriculum->idade)) {{ $curriculum->idade }} @else {{ '' }} @endif" /><br>
            </div>
                </select>
            </div>
            @php
                $nome_imagem = !empty($curriculum->imagem) ? $curriculum->imagem : 'sem_imagem.jpg';
            @endphp
            <div class="col-6">
            <label class="form-label">Insira seu curriculo em .PNG</label><br>
                <input type="file" class="form-control" name="imagem" /><br>
            </div>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href="{{ route('curriculum.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
</div>
@endsection
