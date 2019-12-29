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
                    <form class="needs-validation" id="validated-form">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="firstName">First name</label>
                          <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="lastName">Last name</label>
                          <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>
                      </div>
                      <!-- Rest of the form removed to save space   -->
                      <button class="btn btn-primary btn-lg btn-block" type="submit" @click.prevent="submitForm()">SUBMIT</button>
                    </form>
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

