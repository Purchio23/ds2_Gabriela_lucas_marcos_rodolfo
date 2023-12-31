    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">JORDAN STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" aria-current="page" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastrar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/curriculum/create') }}">Currículo</a></li>
                            <li><a class="dropdown-item" href="{{ url('/funcionario/create') }}">Funcionarios</a></li>
                            <li><a class="dropdown-item" href="{{ url('/produto/create') }}">Produtos</a></li>
                            <li><a class="dropdown-item" href="{{ url('/usuario/create') }}">Usuario</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div style="margin-right: 50px;">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Logar') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
                        </li>
                    @endif
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='fas fa-user'></i> {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"> <i class='fas fa-user-cog'></i> Perfil</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class='fas fa-sign-out-alt'></i> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

  
