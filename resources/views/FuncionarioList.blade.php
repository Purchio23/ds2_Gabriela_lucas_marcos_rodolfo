@extends('base.app')

@section('conteudo')
@section('tituloPagina', 'Listagem de Serviços de Coprodução')
<h1>Listagem De Funcionários cadastrados</h1>
<form action="{{ route('funcionario.search') }}" method="post">

    @csrf
    <div class="row">
        <div class="col-2">
            <select name="campo" class="form-select">
                <option value="nome">Nome</option>
                <option value="telefone">Telefone</option>
                <option value="telefone">Email</option>
            </select>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" placeholder="Pesquisar" name="valor" />
        </div>
        <div class="col-2">
            <input type="date" class="form-control" placeholder="Data" name="data" />
        </div>
        <div class="col-6">
            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i> Buscar
            </button>
            <a class="btn btn-success" href="{{ action('App\Http\Controllers\FuncionarioController@create') }}"><i
                    class="fa-solid fa-plus"></i> Cadastrar</a>
        </div>
    </div>
</form>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
            <th scope="col">Categoria</th>
            <th scope="col">Data</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($funcionarios as $item)
            @php
                $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
            @endphp
            <tr>
                <td scope='row'>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->telefone }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->categoria->nome }}</td>
                <td>{{ $item->data }}</td>
                <td><img src="/storage/{{ $nome_imagem }}" width="100px" class="img-thumbnail" /> </td>
                <td><a href="{{ action('App\Http\Controllers\FuncionarioController@edit', $item->id) }}"><i
                            class='fa-solid fa-pen-to-square' style='color:orange;'></i></a></td>
                <td>
                    <form method="POST"
                        action="{{ action('App\Http\Controllers\FuncionarioController@destroy', $item->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" onclick='return confirm("Deseja Excluir?")' style='all: unset;'><i
                                class='fa-solid fa-trash' style='color:red;'></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
