@extends('base.app')

@section('conteudo')
    @php
        if (!empty($produto->id)) {
            $route = route('produto.update', $produto->id);
        } else {
            $route = route('produto.store');
        }
    @endphp

    @section('tituloPagina', 'Formulário Produtos')

    <h1>Cadastro de produtos</h1>

    <div class="col">
        <div class="row">
            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($produto->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($produto->id)) {{ $produto->id }} @else {{ '' }} @endif" /><br>
                <div class="col-3">
                    <label class="form-label">Nome</label><br>
                    <input type="text" class="form-control" name="nome"
                        value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($produto->nome)) {{ $produto->nome }} @else {{ '' }} @endif" /><br>
                </div>
                <div class="col-3">
                    <label class="form-label">Tamanho</label><br>
                    <input type="text" class="form-control" name="telefone"
                        value="@if (!empty(old('telefone'))) {{ old('telefone') }} @elseif(!empty($produto->telefone)) {{ $produto->telefone }} @else {{ '' }} @endif" /><br>
                </div>
                <div class="col-3">
                    <label class="form-label">Email do Fornecedor</label><br>
                    <input type="email" class="form-control" name="email"
                        value="@if (!empty(old('email'))) {{ old('email') }} @elseif(!empty($produto->email)) {{ $produto->email }} @else {{ '' }} @endif" /><br>
                </div>
                <div class="col-3">
                    <label class="form-label">Data</label><br>
                    <input type="date" class="form-control" name="data"
                        value="@if (!empty(old('data'))) {{ old('data') }} @elseif(!empty($produto->data)) {{ $produto->data }} @else {{ '' }} @endif" /><br>
                </div>
                <div class="col-3">
                    <label class="form-label">Hora</label><br>
                    <input type="time" class="form-control" name="hora"
                        value="@if (!empty(old('hora'))) {{ old('hora') }} @elseif(!empty($produto->hora)) {{ $produto->hora }} @else {{ '' }} @endif" /><br>
                </div>
                <div class="col-3">
                    <label class="form-label">Categoria</label><br>
                    <select name="categoria_id" class="form-select">
                        @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                @php
                    $nome_imagem = !empty($produto->imagem) ? $produto->imagem : 'sem_imagem.jpg';
                @endphp
                <div class="col-6">
                    <br>
                    <input type="file" class="form-control" name="imagem" /><br>
                </div>
                <button class="btn btn-success" type="submit">
                    <i class="fa-solid fa-save"></i> Salvar
                </button>
                <a href="{{ route('produto.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                    Voltar</a> <br><br>
            </form>
        </div>
    </div>
@endsection
