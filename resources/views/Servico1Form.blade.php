@extends('base.app')

@section('conteudo')
    @php
        if (!empty($servico1->id)) {
            $route = route('servico1.update', $servico1->id);
        } else {
            $route = route('servico1.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Funcionários')


<div class="col">
    <div class="row">
        <h1>Formulário de Funcionários</h1>
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($servico1->id))
                @method('PUT')
            @endif

            <h4>Cadastre Funcionários</h4>

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($servico1->id)) {{ $servico1->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($servico1->nome)) {{ $servico1->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Telefone</label><br>
                <input type="text" class="form-control" name="telefone"
                    value="@if (!empty(old('telefone'))) {{ old('telefone') }} @elseif(!empty($servico1->telefone)) {{ $servico1->telefone }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">E-mail</label><br>
                <input type="email" class="form-control" name="email"
                    value="@if (!empty(old('email'))) {{ old('email') }} @elseif(!empty($servico1->email)) {{ $servico1->email }} @else {{ '' }} @endif" /><br>
            </div>
            <label class="form-label">Salário</label><br>
                <input type="text" class="form-control" name="categoria_id"
                    value="@if (!empty(old('categoria_id'))) {{ old('categoria_id') }} @elseif(!empty($servico1->categoria_id)) {{ $servico1->categoria_id }} @else {{ '' }} @endif" /><br>
                </select>
            </div>
            <div class="col-3">
                <br>
                <label class="form-label">Imagem</label><br>
                <input type="file" name="imagem" class="form-control @error('imagem') is-invalid @enderror" />
                @error('imagem')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
           
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href="{{ route('servico1.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
</div>
@endsection
