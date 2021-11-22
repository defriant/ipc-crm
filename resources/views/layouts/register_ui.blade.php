<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('user/css/fontawesome-free/css/all.min.css')}}">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('user/css/materialize.min.css') }}"
        media="screen,projection" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('registration/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('registration/css/style.css')}}">

    <link rel="icon" type="img/png" href="{{ asset('user/img/favicon.png') }}">
</head>

<body>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{asset('registration/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('registration/js/main.js')}}"></script>
    <script type="text/javascript" src="{{ asset('user/js/materialize.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.tooltipped').tooltip();
            $('.collapsible').collapsible();
        });

    </script>
    @if ($message = Session::get('verification_code'))
    <script>
        M.toast({
            html: 'Verification code successfuly sent to {{ $message }}',
            classes: 'rounded green darken-2'
        })

    </script>
    @endif

    @if ($message = Session::get('berhasil_daftar'))
    <script>
        M.toast({
            html: 'Registration was successful !',
            classes: 'rounded green darken-2'
        })

    </script>
    @endif

    @if ($message = Session::get('ubah_password_berhasil'))
    <script>
        M.toast({
            html: 'Password successfully changed &nbsp <i class="material-icons prefix">check</i>',
            classes: 'rounded green darken-2'
        })

    </script>
    @endif

    @if ($message = Session::get('profile_updated'))
    <script>
        M.toast({
            html: 'Profile Updated &nbsp <i class="material-icons prefix">check</i>',
            classes: 'rounded green darken-2'
        })

    </script>
    @endif

    @yield('scripts')
</body>

</html>
