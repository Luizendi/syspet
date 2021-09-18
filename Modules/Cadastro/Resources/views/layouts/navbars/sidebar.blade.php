<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __('Syspet') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="nav-item{{ $activePage == 'pessoa' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('pessoa') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Pessoa') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tabelas">
                    <i class="material-icons">account_tree</i>
                    <p> Tabelas
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'especies' ? 'show' : '' }}" id="tabelas">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'especies' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('especies.index') }}">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal"> Espécies
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> R </span>
                                <span class="sidebar-normal"> Raças
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>


        </ul>
    </div>
</div>