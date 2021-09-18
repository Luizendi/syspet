<div class="wrapper ">
    @include('cadastro::layouts.navbars.sidebar')
    <div class="main-panel">
        @include('cadastro::layouts.navbars.navs.auth')
        @yield('content')
        @include('cadastro::layouts.footers.auth')
    </div>
</div>
