<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('user/css/FA5PRO-master/css/all.min.css')}}">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('user/css/materialize.min.css') }}"
        media="screen,projection" />
    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css?v='.filemtime(public_path('user/css/style.css'))) }}">

    @auth
    <meta name="user-id" content="{{ Auth::user()->id }}">
    @endauth
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="img/png" href="{{ asset('user/img/favicon.png') }}">
</head>

<body>

    <!-- Navbar -->
    @if (Route::has('login'))
    @auth
    <div class="navbar-fixed">
        <!-- Dropdown Structure Akun -->
        <ul id="akun" class="dropdown-content">
            <li><a href="/profile/edit" class="grey-text text-darken-2"><i class="fas fa-cog"></i>Settings</a></li>
            <li><a href="/user-logout" class="grey-text text-darken-2"><i class="fas fa-sign-out-alt"></i>Sign-out</a>
            </li>
        </ul>

        {{-- Dropdown structure notifikasi --}}
        <ul id="notifications-dropdown" class="dropdown-content">
            <li>
                <h6 id="notif-header">NOTIFICATIONS</h6>
            </li>
            <li class="divider"></li>
            <div id="notif-list">
                
            </div>
        </ul>
        <nav>
            <ul class="right hide-on-med-and-down">
                {{--  --}}
            </ul>
            <div class="container">
                <div class="nav-wrapper">
                    <a class="brand-logo hide-on-med-and-down"><img class="logo" src="{{ asset('user/img/logo2.png') }}" alt=""></a>
                    <a class="sidenav-trigger nav-link grey-text text-darken-3"><img class="mobile-logo hide-on-small-only" src="{{ asset('user/img/logo2.png') }}" alt=""></a></a>
                    <ul id="nav-mobile" class="navbar-menu">
                        <li><a href="/" class="waves-effect waves-orange darken-2 nav-link grey-text text-darken-3 tooltipped" data-tooltip="Home">
                                <i class="far fa-home teal-text text-darken-1"></i>
                            </a>
                        </li>
                        <li><a href="/customer-service" class="waves-effect waves-orange darken-2 nav-link grey-text text-darken-3 tooltipped" data-tooltip="Customer Service">
                                <i class="far fa-user-headset orange-text text-darken-2"></i>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-trigger-notifikasi waves-effect waves-orange darken-2 nav-link notif"
                                data-target="notifications-dropdown">
                                <i id="notif" class="material-icons blue-text text-darken-3" style="font-size: 28px;">notifications_none
                                </i>
                            </a>
                        </li>
                        <li>
                            @if(Auth::user()->picture == null)
                            <a class="dropdown-trigger-akun waves-effect waves-orange darken-2 nav-link" data-target="akun"><img
                                    src="{{ asset('user/profile_picture/no-avatar.png') }}" class="foto-profil">
                            </a>
                            @else
                            <a class="dropdown-trigger-akun waves-effect waves-orange darken-2 nav-link" data-target="akun"><img
                                    src="{{ asset('user/profile_picture/'.Auth::user()->picture) }}" class="foto-profil">
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @endif
    
    @endif
    <!-- End Navbar -->

    <!-- Sidenav -->
    <ul class="sidenav" id="mobile-nav">
        <li class="bold"><a href="/" class="waves-effect waves-teal">Home</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a href="" class="subheader">Language</a></li>
        <li><a href="">ENG</a></li>
        <li><a href="">IND</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a href="">Login</a></li>
    </ul>
    <!-- End Sidenav -->

    <main>
        <div class="wrapper">
            @yield('content')
        </div>

    </main>

    <!-- Footer -->
    <footer class="page-footer">
        <div class="footer-copyright grey darken-3">
            <div class="container">
                <div class="center">
                    © 2021 <a href="https://ipctpk.co.id/" class="white-text" target="_blank">PT IPC Terminal Petikemas</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <script type="text/javascript" src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    @if (Route::has('login'))
    @auth
    <input type="hidden" id="my_id" value="{{ Auth::user()->id }}">
    @endif
    @endif
    <script type="text/javascript" src="{{ asset('user/js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/script.js') }}"></script>
    @if ($message = Session::get('berhasil_registrasi_perusahaan'))
    <script>
        M.toast({
            html: 'Berhasil mendaftarkan perusahaan, Silahkan menunggu konfirmasi dari admin.',
            classes: 'rounded green darken-2'
        })
    </script>
    @endif

    @if ($message = Session::get('company_updated'))
    <script>
        M.toast({
            html: '<i class="material-icons prefix">check</i>&nbsp Data perusahaan anda berhasil diubah.',
            classes: 'rounded green darken-2'
        })
    </script>
    @endif

    @if ($message = Session::get('reupload'))
    <script>
        M.toast({
            html: 'Berhasil mengirim ulang persyaratan, Silahkan menunggu konfirmasi dari admin.',
            classes: 'rounded green darken-2'
        })
    </script>
    @endif
</body>

</html>
