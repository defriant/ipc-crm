@extends('layouts.register_ui')
@section('content')
<head>
    <title>IPC | Register</title>
</head>

<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title blue-text text-darken-2">REGISTER</h2>
                    <form method="POST" action="/verification" class="register-form" id="login-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">mail_outline</i>
                                <input id="email" type="email" name="email" class="@error('email') invalid @enderror" value="{{ old('email') }}" autocomplete="off">
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">   
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" name="password" class="@error('password') invalid @enderror">
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="confirmPassword" type="password" name="confirmPassword">
                                <label for="confirmPassword">Confirm Password</label>
                                @error('confirmPassword')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <button type="submit" name="signin" id="signin" class="btn btn-submit waves-effect waves-light orange darken-2">register</button>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('user/img/logo-item2.png')}}"></figure>
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

@endsection

<script type="text/javascript" src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#login-form').on("keypress", function(e){
            var keyCode = e.keyCode || e.which;
            if (keyCode == 13) {
                e.preventDefault();
                return false;
            }
        })
        $('.btn-submit').on('click', function(){
            $(this).addClass('disabled');
        })
    });
</script>