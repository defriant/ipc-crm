@extends('layouts.register_ui')
@section('content')

<head>
    <title>IPC | Edit Profile</title>
    <style>
        .pp{
            width: 200px;
        }
    </style>
</head>

<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title blue-text text-darken-2">EDIT PROFILE</h2>
                    @foreach($data as $d)
                    <form method="POST" action="/profile/{{ $d->id }}/update" class="register-form" id="login-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="firstName" type="text" name="firstName" class="@error('firstName') invalid @enderror" value="{{ $d->first_name }}">
                                <label for="firstName">First Name</label>
                                @error('firstName')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="lastName" type="text" name="lastName" class="@error('lastName') invalid @enderror" value="{{ $d->last_name }}">
                                <label for="lastName">Last Name</label>
                                @error('lastName')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">contact_phone</i>
                                <input id="phoneNumber" type="number" name="phoneNumber" class="@error('phoneNumber') invalid @enderror" value="{{ $d->phone }}">
                                <label for="phoneNumber">Phone Number</label>
                                @error('phoneNumber')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">mail_outline</i>
                                <input id="email" type="email" name="email" class="validate" value="{{ $d->email }}" disabled>
                                <label for="email">Email</label>
                                <span class="helper-text green-text"><i>Verified</i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">streetview</i>
                                <textarea id="textarea1" name="address" class="materialize-textarea @error('address') invalid @enderror">{{ $d->address }}</textarea>
                                <label for="textarea1">Address</label>
                                @error('address')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="signup-image">
                    @if ($d->picture == null)
                        <figure><img id="pp-view" class="circle pp" src="{{ asset('user/profile_picture/no-avatar.png') }}"></figure>
                    @else
                        <figure><img id="pp-view" class="circle pp" src="{{ asset('user/profile_picture/'.$d->picture) }}"></figure>
                    @endif
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn orange darken-2">
                                <span>File</span>
                                <input type="file" id="pp-input" name="profilePicture">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="profilePicture" type="text" placeholder="Chose or drag your picture here">
                            </div>
                        </div>
                    </div>
                    <ul class="collapsible">
                        <li class="@if ($message = Session::get('password_salah')) active @endif @error('newPassword') active @enderror @error('oldPassword') active @enderror">
                            <div class="collapsible-header"><i class="material-icons prefix">lock</i>Change Password</div>
                            <div class="collapsible-body">  
                                <div class="input-field">
                                    <input id="oldPassword" type="password" name="oldPassword" class="@if ($message = Session::get('password_salah')) invalid @endif">
                                    <label for="oldPassword">Old Password</label>
                                    @if ($message = Session::get('password_salah'))
                                        <span class="helper-text red-text"><i>Wrong Password</i></span>
                                    @endif
                                </div>
                                <div class="input-field">
                                    <input id="newPassword" type="password" name="newPassword" class="@error('newPassword') invalid @enderror">
                                    <label for="newPassword">New Password</label>
                                    @error('newPassword')
                                        <span class="helper-text red-text"><i>{{ $errors->first('newPassword') }}</i></span>
                                    @enderror
                                </div>
                                <div class="input-field">
                                    <input id="confirmPassword" type="password" name="confirmPassword" class="@error('newPassword') invalid @enderror">
                                    <label for="confirmPassword">Confirm Password</label>
                                    @error('newPassword')
                                        <span class="helper-text red-text"><i>{{ $errors->first('newPassword') }}</i></span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="form-group form-button">
                        <button type="submit" class="btn waves-effect waves-light blue darken-2">save</button>
                    </div>
                </div>
                </form>
                @endforeach
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