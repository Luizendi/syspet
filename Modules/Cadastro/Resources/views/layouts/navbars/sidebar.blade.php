<div class="sidebar" data-color="green" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __('Syspet') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('cadastro.home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'animais' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('animais.index') }}">
                    <i class="material-icons">pets</i>
                    <p>{{ __('Animais') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'clientes' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('clientes.index') }}">
                    <i class="material-icons">person_add</i>
                    <p>{{ __('Clientes') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tabelas">
                    <i class="material-icons">account_tree</i>
                    <p> Tabelas
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'especies' || $activePage == 'fornecedores' || $activePage == 'leitos' || $activePage == 'racas' || $activePage == 'servicos' || $activePage == 'tipoalta' ? 'show' : '' }}"
                    id="tabelas">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'especies' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('especies.index') }}">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal"> Espécies
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'fornecedores' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('fornecedores.index') }}">
                                <span class="sidebar-mini"> F </span>
                                <span class="sidebar-normal"> Fornecedores
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'racas' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('racas.index') }}">
                                <span class="sidebar-mini"> R </span>
                                <span class="sidebar-normal"> Raças
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'leitos' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('leitos.index') }}">
                                <span class="sidebar-mini"> L </span>
                                <span class="sidebar-normal"> Leitos
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'tipoalta' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('tiposaltas.index') }}">
                                <span class="sidebar-mini"> TA </span>
                                <span class="sidebar-normal"> Tipos de Alta
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'servicos' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('servicos.index') }}">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Serviços
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
