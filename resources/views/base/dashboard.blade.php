@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Principal')
<div class="col" style="padding: 5%">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb">
                <div class="card-body d-flex align-items-center">
                    <img src="{{ url('assets/img/sem_foto.png') }}" class="card-img-top rounded-circle" alt="Imagem do perfil" style="width: 200px; height: 100px; margin-right: 20px;">
                    <div class="col-md-6" style="margin-top: 20px;">
                        <h5 class="card-title">
                            SEJA BEM-VINDO, {{ Auth::user()->name }}
                        </h5>
                        <p class="card-text">E-mail: {{ Auth::user()->email }}</p>
                        <div class="d-flex">
                            <a href="{{ route('profile.edit') }}" class="btn btn-danger mr-1">Editar Perfil</a>
ㅤ
                            <a href="{{ url('/') }}" class="btn btn-danger mr-1">Voltar ao Welcome</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col" style="padding: 5%">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Listagem Currículos</h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{('curriculum')}}" class="btn btn-danger">Editar Perfil</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Listagem Funcionários</h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{ url('/funcionario') }}" class="btn btn-danger">Clique aqui</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Listagem de Produtos</h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{ url('/produto') }}" class="btn btn-danger">Clique aqui</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Listagem de Usuários</h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{ url('/usuario') }}" class="btn btn-danger">Clique aqui</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
