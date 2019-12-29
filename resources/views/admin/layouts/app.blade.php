<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @yield('csspage')
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admins') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admins') }}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap&display=swap" rel="stylesheet">
    <!-- themify-icons -->
    <link rel="stylesheet" href="{{ asset('admins') }}/assets/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('admins') }}/assets/css/main.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        @include('admin.widgets.menu')
        @yield('content')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('admins') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admins') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('admins') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('admins') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('admins') }}/dist/js/adminlte.js"></script>

    @yield('jspage')
</body>

</html>
