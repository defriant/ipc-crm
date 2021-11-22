<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPC | Login</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('user_ui/css/materialize.min.css') }}" media="screen,projection" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('login_ui/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('login_ui/css/style.css')}}">

    <link rel="icon" type="img/png" href="{{ asset('user_ui/img/ipc_logo.png') }}">
</head>
<body>

<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{asset('user_ui/img/logo4.png')}}"></figure>
                    <p class="signup-image-link">Don't have account yet ? <a href="/register">Register Here</a></p>
                </div>

                <div class="signin-form">
                    <h2 class="form-title blue-text text-darken-2">LOGIN</h2>
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">mail_outline</i>
                                <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit orange darken-2" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="fixed-action-btn">
    <a href="/" class="btn-floating btn-large blue darken-2 tooltipped" data-position="left" data-tooltip="Back to home page">
        <i class="large material-icons">home</i>
    </a>
</div>

<script src="{{asset('login_ui/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('login_ui/js/main.js')}}"></script>
<script type="text/javascript" src="{{ asset('user_ui/js/materialize.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.tooltipped').tooltip();
    });
</script>
@error('email')
<script>
        M.toast({html: 'Email and Password doesn`t match our record !', classes: 'rounded red darken-2'})
</script>
@enderror

@if ($message = Session::get('berhasil_daftar'))
    <script>
        M.toast({html: 'Registration success !', classes: 'rounded green darken-2'})
    </script>
@endif

</body>
</html>