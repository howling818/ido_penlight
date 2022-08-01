<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Idol Penlight Search</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/datepicker-ja.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                <span class="brand-text font-weight-light">PenLight Search</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Widgets</p>
                            </a>
                        </li>
                        <li class="nav-item @if ($pageFlg=='Groups') menu-open @endif">
                            <a href="#" class="nav-link @if ($pageFlg=='Groups') active @endif">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Group<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/group/create') }}" class="nav-link @if ($subPageFlg=='GropuAdd') active @endif">
                                    <i class="fas fa-plus-circle nav-icon"></i>
                                    <p>Add Group</p>
                                    </a>
                                </li>
                                @foreach ($idolGroupLists as $idolGroup)
                                <li class="nav-item">
                                    <a href="{{ url('/group/list/'.$idolGroup.id) }}" class="nav-link @if ($subPageFlg=='GropuId-'.$idolGroup.id) active @endif">
                                    <i class="far fa-link nav-icon"></i>
                                    <p>{{$idolGroup.group_name}}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <input type="hidden" id="url" value="{{ url('/') }}">
    <script>
        $(document).on('click', '.move_method', function(e) {
            e.preventDefault(); // does not go through with the link.

            var $this = $(this);
            window.location.href = $this.attr('data-action');
        });
    </script>
</body>
</html>
