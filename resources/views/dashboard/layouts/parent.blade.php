<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <link rel="stylesheet"
        href="{{ url('/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('/dashboard/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/dashboard/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('/dashboard/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Bootstrap 4 RTL -->
    {{-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"> --}}
    <!-- Custom style for RTL -->
    {{-- <link rel="stylesheet" href="/dashboard/dist/css/custom.css"> --}}
    <!-- Scripts -->
    {{-- <script src="{{ asset('/js/app.js') }}" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png"> --}}
    <!-- Place favicon.ico in the root directory -->
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard.home') }}" class="nav-link">{{ __('Home') }}</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        @if (auth()->guard('admin')->user()->unreadNotifications->count() > 0)
                            <span
                                class="badge badge-warning navbar-badge">{{ auth()->guard('admin')->user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span
                            class="dropdown-item dropdown-header">{{ auth()->guard('admin')->user()->unreadNotifications->count() }}
                            Notifications</span>
                        <div class="dropdown-divider"></div>
                        @foreach (auth()->guard('admin')->user()->unreadNotifications as $notification)
                            <a href="{{ route('notifications.read', $notification->id) }}" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> {{ $notification->data['body'] }}
                                <span
                                    class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                            </a>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('notifications.readAll') }}" class="dropdown-item dropdown-footer">Mark All
                            as Read</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <x-Sidebar />

        <!-- /.Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="contents">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>
                    <!-- /.row -->

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    
    <!-- AdminLTE App -->
    <script src="{{ url('/dashboard/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ url('/dist/js/demo.js') }}"></script> --}}
   
    <!-- Bootstrap 4 rtl -->
    {{-- <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script> --}}

    @yield('js')
</body>

</html>
