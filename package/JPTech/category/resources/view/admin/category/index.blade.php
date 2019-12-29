{{-- @extends('admin.layouts.app')

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
                    <h2>Demo Translation: {{ trans("post::generic.name") }}</h2>
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
 --}}
 @extends('admin.layouts.app')

 @section('csspage')
 <!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{ asset('admins') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- Perfect scrollbar -->
 <link rel="stylesheet" href="{{ asset('admins') }}/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
 @endsection

 @section('jspage')
 <!-- Perfect scrollbar -->
 <script src="{{ asset('admins') }}/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
 <!-- JS product category -->
 <script src="{{ asset('admins') }}/assets/js/productCategory/index.js"></script>
 @endsection

 @section('content')
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light custom_main_header">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item d-none d-sm-inline-block">
             Danh mục sản phẩm
         </li>
     </ul>
     @include('admin.widgets.header')
 </nav>
 <!-- /.navbar -->
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div id="app">
        <app></app>
     </div>
     <!-- /.content-header -->
     <!-- Main content -->
     <div class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12 p-0">
                     <div class="card">
                         <form method="POST" action="" class="card-header">
                             <div class="input-group input-group-sm custom_box_search">
                                 <h1 class="title_card">Danh sách danh mục</h1>
                             </div>
                             <div class="input-group input-group-sm custom_box_search d-flex justify-content-end">
                                 <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm...">
                                 <div class="input-group-append">
                                     <button type="submit" class="btn btn-default">
                                         <i class="ti-search"></i>
                                     </button>
                                 </div>
                                 <a class="btn btn_dropdown dropdown-toggle mx-4" href="#" role="button" id="show_column" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="ti-more-alt"></i>
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="show_column">
                                     <a class="dropdown-item" href="#"><i class="ionicons ion-ios-loop"></i>Mặc định</a>
                                     <div class="dropdown-item">
                                         <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="showcol-1">
                                             <label for="showcol-1">
                                                 Xem col1
                                             </label>
                                         </div>
                                     </div>
                                     <div class="dropdown-item">
                                         <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="showcol-2">
                                             <label for="showcol-2">
                                                 Xem col2
                                             </label>
                                         </div>
                                     </div>
                                     <div class="dropdown-item">
                                         <div class="icheck-primary d-inline">
                                             <input type="checkbox" id="showcol-3">
                                             <label for="showcol-3">
                                                 Xem col3
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                                 <button class="btn custom_btn">Cập nhật</button>
                             </div>
                             <!-- /.input group -->
                         </form>
                         <!-- /.card-header -->
                         <div class="card-body table-responsive">
                             <table class="table table_custom">
                                 <thead>
                                     <tr>
                                         <th>STT</th>
                                         <th>Icon</th>
                                         <th>Tên danh mục</th>
                                         <th>Vị trí</th>
                                         <th>Trạng thái</th>
                                         <th>Số lượng sản phẩm</th>
                                         <th>Tùy chỉnh</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td>1</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>Collagen</td>
                                         <td>
                                             <input type="text" value="1" class="custom_ipt" />
                                         </td>
                                         <td><span class="text_disable">Ẩn</span></td>
                                         <td>45/56</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>2</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>Thực phẩm sức khỏe</td>
                                         <td>
                                             <input type="text" value="2" class="custom_ipt" />
                                         </td>
                                         <td><span class="text_active">Hiện</span></td>
                                         <td>1.137/1.400</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>3</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>- Thảo dược quý</td>
                                         <td>
                                             <input type="text" value="1" class="custom_ipt" />
                                         </td>
                                         <td><span class="text_active">Hiện</span></td>
                                         <td>137/400</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>4</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>- Sức khỏe và sinh lý nam</td>
                                         <td>
                                             <input type="text" value="2" class="custom_ipt" />
                                         </td>
                                         <td><span class="text-danger">Ngưng hoạt động</span></td>
                                         <td>145/145</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>5</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>-- Thải độc gan</td>
                                         <td>
                                             <input type="text" value="1" class="custom_ipt" />
                                         </td>
                                         <td><span class="text-danger">Ngưng hoạt động</span></td>
                                         <td>25/30</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>6</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>-- Giải rượu</td>
                                         <td>
                                             <input type="text" value="2" class="custom_ipt" />
                                         </td>
                                         <td><span class="text-danger">Ngưng hoạt động</span></td>
                                         <td>45/54</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>7</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>-- Tăng cường sinh lý</td>
                                         <td>
                                             <input type="text" value="3" class="custom_ipt" />
                                         </td>
                                         <td><span class="text-danger">Ngưng hoạt động</span></td>
                                         <td>1.000/1.000</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>8</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>Chăm sóc da mặt</td>
                                         <td>
                                             <input type="text" value="3" class="custom_ipt" />
                                         </td>
                                         <td><span class="text_active">Hiện</span></td>
                                         <td>205/205</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>9</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>Chăm sóc cơ thể</td>
                                         <td>
                                             <input type="text" value="4" class="custom_ipt" />
                                         </td>
                                         <td><span class="text_active">Hiện</span></td>
                                         <td>60/90</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>10</td>
                                         <td>
                                             <img src="{{ asset('admins') }}/assets/img/no-img.png" class="custom_img"/>
                                         </td>
                                         <td>- Sữa tắm</td>
                                         <td>
                                             <input type="text" value="1" class="custom_ipt" />
                                         </td>
                                         <td><span class="text_active">Hiện</span></td>
                                         <td>89/89</td>
                                         <td>
                                             <a class="btn btn_active dropdown-toggle" href="#" role="button" id="user-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="ti-more-alt"></i>
                                             </a>
                                             <div class="dropdown-menu" aria-labelledby="user-1">
                                                 <a class="dropdown-item" href="#">Ẩn</a>
                                                 <a class="dropdown-item" href="#">Hiện</a>
                                                 <a class="dropdown-item" href="#">Ngưng hoạt động</a>
                                             </div>
                                             <a href="#" title="Chỉnh sửa"><i class="ionicons ion-compose"></i></a>
                                         </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer clearfix">
                             <ul class="pagination pagination-sm m-0">
                                 <li class="page-item"><a class="page-link page_arrow p-0" href="#"><i class="ti-angle-double-left"></i></a></li>
                                 <li class="page-item"><a class="page-link page_arrow p-0" href="#"><i class="ti-angle-left"></i></a></li>
                                 <li class="page-item"><a class="page-link active p-0" href="#">1</a></li>
                                 <li class="page-item"><a class="page-link p-0" href="#">2</a></li>
                                 <li class="page-item"><a class="page-link p-0" href="#">3</a></li>
                                 <li class="page-item"><a class="page-link p-0" href="#"><i class="ti-more-alt"></i></a></li>
                                 <li class="page-item"><a class="page-link p-0" href="#">5</a></li>
                                 <li class="page-item"><a class="page-link page_arrow p-0" href="#"><i class="ti-angle-right"></i></a></li>
                                 <li class="page-item"><a class="page-link page_arrow p-0" href="#"><i class="ti-angle-double-right"></i></a></li>
                             </ul>
                             <div class="custom_select_option">
                                 <select class="custom-select">
                                     <option value="20">20</option>
                                     <option value="50">50</option>
                                     <option value="100">100</option>
                                 </select>
                                 <i class="ti-control-play"></i>
                             </div>
                             <span>Hiển thị 10 - 30 của 97 tài khoản</span>
                         </div>
                     </div>
                     <!-- /.card -->
                 </div>
             </div>
             <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </div>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <script src="{{ asset_package('JPTech/category/resources/assets/app.js') }}"></script>
 @endsection

