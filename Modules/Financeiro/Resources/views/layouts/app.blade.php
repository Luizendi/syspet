<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('.:: Syspet ::.') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>

<body class="{{ $class ?? '' }}">
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.page_templates.auth')
    @endauth
    @guest()
        @include('layouts.page_templates.guest')
    @endguest

    <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
    <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
    <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
    <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
    <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
    <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
    <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
    <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
    <script src="{{ asset('material') }}/demo/demo.js"></script>
    <script src="{{ asset('material') }}/js/settings.js"></script>
    @stack('js')
</body>

</html>
