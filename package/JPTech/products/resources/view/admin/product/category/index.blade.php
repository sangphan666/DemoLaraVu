@extends('admin.layouts.app')

@section('csspage')
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('admins') }}/plugins/fontawesome-free/css/all.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('jspage')
<!-- AdminLTE -->
<script src="{{ asset('admins') }}/dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('admins') }}/plugins/chart.js/Chart.min.js"></script>
<script src="{{ asset('admins') }}/dist/js/demo.js"></script>
<script src="{{ asset('admins') }}/dist/js/pages/dashboard3.js"></script>
@endsection

@section('content')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light custom_main_header">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            Dashboard
        </li>
    </ul>
    @include('admin.widgets.header')
</nav>
<!-- /.navbar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <h2>Demo Configs: {{ config("contact.my_phone") }}</h2>
                    <br>
                    <h2>Demo Helper: {!! example_helper_func() !!}</h2>
                    <br>
                    <h2>Demo Translation: {{ trans("category::generic.name") }}</h2>
                    @foreach($category as $list)
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $list->name }}</h2>
                            <article>{{ $list->description }}</article>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

