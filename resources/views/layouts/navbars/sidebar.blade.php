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
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('modulo.Atendimento') }}">
                    <i class="material-icons">medical_services</i>
                    <p>{{ __('Atendimentos') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('modulo.Cadastro') }}">
                    <i class="material-icons">app_registration</i>
                    <p>{{ __('Cadastros') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
