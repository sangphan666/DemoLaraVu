<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="ti-bell"></i>
            <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 thông báo</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 tin mới
                <span class="float-right text-muted text-sm">3 phút trước</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Xem tất cả thông báo</a>
        </div>
    </li>
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="{{ asset('admins') }}/assets/img/logo.jpg" alt="Japana"
            class="brand-image img-circle elevation-3 mr-1" style="opacity: .8;">
            <span>Admin</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Xin chào: {{ ucfirst(Auth()->user()->name) }}</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="ti-user mr-2"></i> Quản lý tài khoản
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="ti-key mr-2"></i> Đổi mật khẩu
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('logout')}}" class="dropdown-item">
                <i class="ti-shift-right mr-2"></i> Đăng xuất
            </a>
        </div>
    </li>
</ul>
