<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IPC | CS</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('user/css/FA5PRO-master/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admins/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admins/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/dist/css/style.css') }}">

    <link rel="icon" type="img/png" href="{{ asset('user/img/favicon.png') }}">
    <style>
        
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
	<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user">&nbsp; {{ Auth::user()->first_name.' '.Auth::user()->last_name }}</i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Sign-out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
        <img src="{{ asset('user/img/favicon.png') }}" class="brand-image">
        <span class="brand-text font-weight-light">IPC TPK</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.cs') }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                <i class="nav-icon far fa-home"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.company.registration') }}" class="nav-link {{ (request()->is('company/registration')) ? 'active' : '' }} {{ (request()->is('registration/{id}')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                    Registration
                    <span id="side-menu-regis-notif" class="right badge badge-danger" style="display: none;">New</span>
                </p>
                </a>
            </li>
            <li class="nav-item" id="nav-complaint">
                <a href="{{ route('admin.complaints') }}" class="nav-link {{ (request()->is('complaint')) ? 'active' : '' }}">
                <i class="nav-icon far fa-user-headset"></i>
                <p>
                    Customer Service
                    <span id="side-menu-complaint-notif" class="right badge badge-danger" style="display: none;">New</span>
                </p>
                </a>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

        <main>
            @yield('content')
        </main>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright © 2021 <a href="https://ipctpk.co.id/" target="_blank">PT. IPC TPK</a>.</strong>
        All rights reserved.
    </footer>
    <!-- End Footer -->
</div>
<!-- END WRAPPER -->


@if (Route::has('login'))
@auth
<input type="hidden" id="my_id" value="{{ Auth::user()->id }}">
<input type="hidden" id="my_role" value="{{ Auth::user()->role }}">
@endif
@endif

<audio controls controlsList="nodownload" src="{{ asset('abc.mp3') }}" id="notif_sound"></audio>
<!-- jQuery -->
<script src="{{ asset('admins/plugins/jquery/jquery.min.js') }}"></script>
{{-- Pusher Js --}}
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

{{-- Notification --}}
<script>
    var sound = document.getElementById('notif_sound');
    function notif_sound() {
        sound.autoplay = true;
        sound.play();
    };
</script>
<script src="{{ asset('admins/dist/js/regis.js') }}"></script>
<script src="{{ asset('admins/dist/js/complaint.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admins/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('admins/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('admins/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admins/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('admins/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admins/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admins/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admins/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admins/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admins/dist/js/demo.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('admins/plugins/toastr/toastr.min.js') }}"></script>
</body>

</html>
