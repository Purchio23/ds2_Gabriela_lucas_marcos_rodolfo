@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Principal')
<div class="col" style="padding: 5%">
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-file-earmark-text-fill bi-3x" viewBox="0 0 16 16">
                            <path d="M5.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-5zm0 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-5zm0 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-3zM2 1.5A1.5 1.5 0 0 0 .5 3v10A1.5 1.5 0 0 0 2 14.5h12a1.5 1.5 0 0 0 1.5-1.5v-11A1.5 1.5 0 0 0 14 0H6.5A1.5 1.5 0 0 0 5 1.5v3A.5.5 0 0 1 4.5 5h-3A1.5 1.5 0 0 0 0 6.5v6A1.5 1.5 0 0 0 1.5 14h2a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5h-3A2.5 2.5 0 0 1 0 12.5v-6A2.5 2.5 0 0 1 2.5 4h3A.5.5 0 0 1 6 3.5v-2A1.5 1.5 0 0 0 4.5 0h-2z"/>
                        </svg>
                        Listagem Currículos
                    </h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{('vaga')}}" class="btn btn-primary">Clique aqui</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-people-fill bi-3x" viewBox="0 0 16 16">
                            <path d="M5.5 1A1.5 1.5 0 0 1 7 2.5c0 .972-.745 2.84-2.499 4.638C3.363 7.836 2.5 9.324 2.5 11v.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V11c0-1.676-.863-3.164-2.001-4.862C9.245 5.34 8.5 3.472 8.5 2.5A1.5 1.5 0 0 1 10 1h2.5a.5.5 0 0 1 .5.5v2.5A2.5 2.5 0 0 1 10 6H9.146a2.5 2.5 0 0 1-1.938.938L5 7.25v7.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-8A1.5 1.5 0 0 1 2 5.5H3a.5.5 0 0 1 .5.5v6a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 1 .5-.5h1a1.5 1.5 0 0 1 1.5 1.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.75a2.5 2.5 0 0 1-1.208-.515L9.854 9.5H10A2.5 2.5 0 0 1 10 6H5V1.5z"/>
                        </svg>
                        Listagem Funcionários
                    </h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{ url('/servico1') }}" class="btn btn-primary">Clique aqui</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-briefcase-fill bi-3x" viewBox="0 0 16 16">
                            <path d="M0 2.5A2.5 2.5 0 0 1 2.5 0h11A2.5 2.5 0 0 1 16 2.5v11a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 0 13.5v-11zM2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-11A1.5 1.5 0 0 0 13.5 1h-11zM8 4a.5.5 0 0 0-.5.5V6h-2.5a.5.5 0 0 0 0 1H7v1.5a.5.5 0 0 0 1 0V7h2.5a.5.5 0 0 0 0-1H8V4.5A.5.5 0 0 0 8 4z"/>
                        </svg>
                        Listagem de Produtos
                    </h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{ url('/reuniao') }}" class="btn btn-primary">Clique aqui</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-fill bi-3x" viewBox="0 0 16 16">
                            <path d="M8 0a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm0 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm4 9.408c-.07-.466-.396-.83-.81-.908-2.464-.37-4.716-.37-7.18 0-.414.078-.74.442-.81.908-.416 2.772-1.354 4.542-2.01 5.66a.702.702 0 0 0-.036.732l.55 1.33a.134.134 0 0 0 .132.092h3.804a.135.135 0 0 0 .132-.159l-.554-1.34a.703.703 0 0 0-.036-.732c-.656-1.119-1.594-2.888-2.01-5.66zm1.852-4.217a6.105 6.105 0 0 0-.304-.667l.337-.743c.157-.347.098-.598-.162-.872-.398-.401-.994-.615-1.723-.615-.72 0-1.326.214-1.723.615-.26.274-.319.525-.162.872l.337.743a6.111 6.111 0 0 0-.304.667c-.518 2.034-1.358 3.514-2.071 4.54C4.448 14.158 5.38 15 6.5 15h3c1.12 0 2.052-.842 2.425-2.075C11.21 13.705 10.37 12.225 9.852 10.191z"/>
                        </svg>
                        Listagem de Usuários
                    </h5>
                    <p class="card-text">Descrição aqui</p>
                    <a href="{{ url('/usuario') }}" class="btn btn-primary">Clique aqui</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
