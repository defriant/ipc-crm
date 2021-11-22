@extends('layouts.register_ui')
@section('content')

<head>
    <title>Complete your profile</title>
    <style>
        .a{
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: -30px;
            padding-top: 70px;
        }
        @media (min-width: 910px){
            .button-submit{
                padding-top: 130px;
                padding-left: 150px;
            } 
        }
        @media (min-width: 769px) and (max-width: 909px){
            .button-submit{
                padding-top: 130px;
                padding-left: 80px;
            } 
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
                <h5 class="center blue-text text-darken-2">LENGKAPI PROFIL ANDA</h5>
            </div>
            <div class="signup-content">
                <div class="signup-form">
                    <form method="POST" action="" class="register-form" id="login-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <i class="fas fa-user prefix"></i>
                                <input id="firstName" type="text" name="firstName" class="@error('firstName') invalid @enderror" value="{{ old('firstName') }}">
                                <label for="firstName">Nama Depan</label>
                                @error('firstName')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="far fa-user prefix"></i>
                                <input id="lastName" type="text" name="lastName" class="" value="{{ old('lastName') }}">
                                <label for="lastName">Nama Belakang</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="fas fa-user-tie prefix"></i>
                                <input id="profession" type="text" name="profession" class="@error('profession') invalid @enderror" value="{{ old('profession') }}">
                                <label for="profession">Profesi</label>
                                @error('profession')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">contact_phone</i>
                                <input id="phoneNumber" type="number" name="phoneNumber" class="@error('phoneNumber') invalid @enderror" value="{{ old('phoneNumber') }}">
                                <label for="phoneNumber">Nomor Telfon</label>
                                @error('phoneNumber')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">streetview</i>
                                <textarea id="textarea1" name="address" class="materialize-textarea @error('address') invalid @enderror">{{ old('address') }}</textarea>
                                <label for="textarea1">Alamat</label>
                                @error('address')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="signin-form">
                    <div class="row">
                        <figure><img id="pp-view" class="circle" src="{{ asset('user/profile_picture/no-avatar.png') }}" width="200px"></figure>
                        <div class="file-field input-field">
                            <div class="btn orange darken-2">
                                <span>File</span>
                                <input type="file" id="pp-input" name="profilePicture">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="profilePicture" type="text" placeholder="Foto Profil">
                                <span class="helper-text"><i>215 x 215 (Recomended)</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-button button-submit">
                        <button type="submit" class="btn waves-effect waves-light blue darken-2">Lanjut</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection