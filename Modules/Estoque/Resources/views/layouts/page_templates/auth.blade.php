<div class="wrapper ">
    @include('estoque::layouts.navbars.sidebar')
    <div class="main-panel">
        @include('estoque::layouts.navbars.navs.auth')
        @yield('content')
        @include('estoque::layouts.footers.auth')
    </div>
</div>
