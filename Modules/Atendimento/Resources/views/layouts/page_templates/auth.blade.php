<div class="wrapper ">
    @include('atendimento::layouts.navbars.sidebar')
    <div class="main-panel">
        @include('atendimento::layouts.navbars.navs.auth')
        @yield('content')
        @include('atendimento::layouts.footers.auth')
    </div>
</div>
