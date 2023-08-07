    <!-- Preloader -->
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ url('admins') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> --}}

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li>
            <li class="nav-item d-none d-sm-inline-block"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('adminlogout') }}" >Logout</a>
            </li>
        </ul>
    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin') }}" class="brand-link">
            <img src="{{ url('admins') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

            <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image"><img src="{{ isAvatar(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image"></div>
                <div class="info"><a href="{{ route('admin.user.edit',Auth::user()->id) }}" class="d-block">{{ Auth::user()->name }}</a></div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @role('admin')
                    <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link {{ (Request::routeIs('admin')) ? 'active' : '' }}"><i class="nav-icon fas fa-tachometer-alt"></i><p>Tổng quan</p></a></li>
                    @endrole

                    @role('genre','admin')
                    <li class="nav-item"><a href="{{ route('admin.genre') }}" class="nav-link {{ (Request::routeIs('admin.genre') || Request::routeIs('admin.genre.create') || Request::routeIs('admin.genre.edit') || Request::routeIs('admin.genre.search')) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-list"></i><p>Quản lý thể loại</p></a></li>
                    @endrole

                    @role('book','admin')
                    <li class="nav-item"><a href="{{ route('admin.book') }}" class="nav-link {{ (Request::routeIs('admin.book') || Request::routeIs('admin.book.create') || Request::routeIs('admin.book.edit') || Request::routeIs('admin.book.search')) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-book"></i><p>Quản lý sách truyện</p></a></li>
                    @endrole

                    @role('chap','admin')
                    <li class="nav-item"><a href="{{ route('admin.chap') }}" class="nav-link {{ (Request::routeIs('admin.chap') || Request::routeIs('admin.chap.create') || Request::routeIs('admin.chap.edit') || Request::routeIs('admin.chap.search')) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-book-open"></i><p>Quản lý chương truyện</p></a></li>
                    @endrole

                    @role('author','admin')
                    <li class="nav-item"><a href="{{ route('admin.author') }}" class="nav-link {{ (Request::routeIs('admin.author') || Request::routeIs('admin.author.create')  || Request::routeIs('admin.author.edit')) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-user"></i><p>Quản lý tác giả</p></a></li>
                    @endrole

                    @role('accent','admin')
                    <li class="nav-item"><a href="{{ route('admin.accent') }}" class="nav-link {{ (Request::routeIs('admin.accent') || Request::routeIs('admin.accent.create')  || Request::routeIs('admin.accent.edit')) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-user"></i><p>Quản lý người đọc</p></a></li>
                    @endrole

                    @role('user','admin')
                    <li class="nav-item"><a href="{{ route('admin.user') }}" class="nav-link {{ (Request::routeIs('admin.user') || Request::routeIs('admin.user.create')  || Request::routeIs('admin.user.edit') || Request::routeIs('admin.user.getchangepass')) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-user"></i><p>Quản lý tài khoản</p></a></li>
                    @endrole

                    @role('role','admin')
                    <li class="nav-item"><a href="{{ route('admin.role') }}" class="nav-link {{ (Request::routeIs('admin.role') || Request::routeIs('admin.role.create')  || Request::routeIs('admin.role.edit')) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-user"></i><p>Quản lý quyền</p></a></li>
                    @endrole

                    @role('gallery','admin')
                    <li class="nav-item"><a href="{{ route('admin.gallery') }}" class="nav-link {{ (Request::routeIs('admin.gallery') || Request::routeIs('admin.gallery.create')  || Request::routeIs('admin.gallery.edit') ) ? 'active' : '' }}"><i class="nav-icon fas fa-solid fa-image"></i><p>Quản lý ảnh bìa</p></a></li>
                    @endrole
                </ul>
            </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
