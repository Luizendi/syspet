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
                <a class="nav-link" href="{{ route('Estoque.home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#estoque">
                    <i class="material-icons">storefront</i>
                    <p> Estoque
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'compras' ? 'show' : '' }}"
                    id="estoque">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'compras' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('compras.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal"> Compras
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activePage == 'movimentacao' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('movimentacao.index') }}">
                                <span class="sidebar-mini"> M </span>
                                <span class="sidebar-normal"> Movimentação
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
