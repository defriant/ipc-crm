@extends('layouts.register_ui')
@section('content')

<head>
    <title>Verfy your email address</title>
    <style>
        .a{
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: -25px;
            padding-top: 70px;
        }
        .vl{
            border-left: 6px solid #f57c00;
            height: 45px;
            padding-left: 10px;
        }
    </style>
</head>

<div class="main">
    <section class="signup">
        <div class="container">
                <div class="a">
                    <div class="vl">
                        <p><i>To prevent misuse, enter the verification code that was sent to <b>{{ $email }}.</b></i></p>
                    </div>
                </div>
            <div class="signup-content">
                <div class="signup-form">  
                    <form id="form-verification-code" action="/verification/next" method="post" class="register-form" id="login-form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $url_id }}">
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="code" type="number" name="code" class="" autofocus>
                                <label for="code">Verification Code</label>
                                <span id="invalid-code" class="helper-text red-text" style="display: none"><i>Invalid verification code</i></span>
                            </div>
                            <div class="input-field">
                                <a id="resend-code" onclick="resend_code()" data-href="/verification/resend/{{$url_id}}" class="term-service" style="cursor: pointer"><u>Resend verification code</u></a>
                                <a id="resend-loading" style="display: none">Sending ...</a>
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <button id="verification-attempt" data-id="{{$url_id}}" type="button" name="signin" id="signin" class="btn waves-effect waves-light blue darken-2">verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection