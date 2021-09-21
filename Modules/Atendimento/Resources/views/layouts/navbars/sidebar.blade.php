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
                <a class="nav-link" href="{{ route('atendimento.home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'agendamentos' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('agendamentos.index') }}">
                    <i class="material-icons">today</i>
                    <p>{{ __('Agendamentos') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#relatorios">
                    <i class="material-icons">description</i>
                    <p> Relatórios
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="relatorios">
                    <ul class="nav">

                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tabelas">
                    <i class="material-icons">account_tree</i>
                    <p> Tabelas
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="tabelas">
                    <ul class="nav">

                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
