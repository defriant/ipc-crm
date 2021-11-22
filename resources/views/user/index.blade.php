@extends('layouts.user_ui')
@section('content')

<head>
    <title>PT IPC Terminal Petikemas</title>
</head>

<!-- Jumbotron -->
<div class="jumbotron">
    <div class="jumbotron-content">
        <div class="row">
            @if (Route::has('login'))
            @auth
            <div class="col xl6 l6 m12 s12 kiri">
                <div class="pwelcome">
                    <h5 class="center"><b>WELCOME, {{ Auth::user()->first_name }}</b></h5>
                </div>
            </div>
            <div class="col xl4 l6 s12">
                <div class="card blunt login kanan z-depth-5">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 center">
                                @if(Auth::user()->picture == null)
                                <img class="pp" src="{{ asset('user/profile_picture/no-avatar.png') }}">
                                @else
                                <img class="pp" src="{{ asset('user/profile_picture/'.Auth::user()->picture) }}">
                                @endif
                                <br>
                                <p class="pname">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                                <p class="pposition">{{ Auth::user()->profession }}</p>
                                <hr>
                            </div>
                            <div class="col s12">
                                <div class="input-field col m6 s12 center black-text">
                                    <p><i class="material-icons">email</i></p>{{ Auth::user()->email }}
                                </div>
                                <div class="input-field col m6 s12 center black-text">
                                    <p><i class="material-icons">perm_phone_msg</i></p>{{ Auth::user()->phone }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col xl5 offset-xl1 l6 m12 s12">
                <div class="card-panel blunt login kanan black-text z-depth-5">
                    <div class="card-content">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <h5 class="center orange-text text-darken-2">SIGN-IN TO YOUR ACCOUNT</h5>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="input-field">
                                        <i class="material-icons prefix">mail_outline</i>
                                        <input id="email" type="text" name="email"
                                            class="@error('email') invalid @enderror" value="{{ old('email') }}"
                                            required autocomplete="off">
                                        <label for="email">Email</label>
                                        @error('email')
                                        <span class="helper-text red-text"><i>Email and Password doesn't match our
                                                record !</i></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input id="password" type="password" name="password"
                                            class="@error('email') invalid @enderror" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <button button type="submit" style="border-radius: 10px;"
                                        class="waves-effect waves-light btn orange darken-2">Sign-in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col xl1 l1"></div>
            <div class="col xl5 l5 m12 s12 kiri">
                <h5 style="text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);"><b>DON'T HAVE ACCOUNT YET ?</b></h5>
                <a href="/register" style="border-radius: 10px; margin-top:5px;"
                    class="waves-effect waves-light btn orange darken-2 z-depth-3">REGISTER HERE</a>
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
<!-- End Jumbotron -->
{{-- Recent Activity & Company --}}
@if (Route::has('login'))
@auth
<section>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l5 xl4">
                <div id="work-collections">
                    <ul id="projects-collection" class="collection z-depth-1">
                        @if (Auth::user()->company_status == 'registered')
                            <li class="collection-item avatar">
                                <div class="row">
                                    <div class="col s9">
                                        <i class="fas fa-building cyan circle"></i>
                                        <h5 class="collection-header m-0">My Company</h5>
                                        <p><i>{{ Auth::user()->company->company_name }}</i></p>
                                    </div>
                                    <div class="col s3">
                                        <a id="company-edit" class="btn-floating btn-medium waves-effect waves-light red tooltipped" data-position="left" data-tooltip="Update" style="position: absolute; bottom: -20px;">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s2 center">
                                        <i class="fas fa-crown fa-2x"></i>
                                    </div>
                                    <div class="col s10">
                                        <p class="collections-title">Pimpinan</p>
                                        <p class="collections-content"><i>{{ Auth::user()->company->leader_name }}</i></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s2 center">
                                        <i class="fas fa-id-card-alt fa-2x cyan-text"></i>
                                    </div>
                                    <div class="col s10">
                                        <p class="collections-title">NPWP</p>
                                        <p class="collections-content"><i>{{ Auth::user()->company->npwp }}</i></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s2 center">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div class="col s10">
                                        <p class="collections-title">Alamat</p>
                                        <p class="collections-content"><i>{{ Auth::user()->company->address }}</i></p>
                                    </div>
                                </div>
                            </li>
                        @elseif(Auth::user()->company_status == 'unregistered')
                            <li class="collection-item avatar">
                                <div class="row">
                                    <div class="col s9">
                                        <i class="fas fa-building cyan circle"></i>
                                        <h5 class="collection-header m-0">My Company</h5>
                                        <p><i>Unknown</i></p>
                                    </div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s12 center">
                                        <br><br>
                                        <h6 class="">Anda belum mendaftarkan perusahaan.</h6>
                                        <a href="/company-registration" class="">Daftar sekarang</a>
                                        <br><br><br>
                                    </div>
                                </div>
                            </li>
                        @elseif(Auth::user()->company_status == 'waiting')
                            <li class="collection-item avatar">
                                <div class="row">
                                    <div class="col s9">
                                        <i class="fas fa-building cyan circle"></i>
                                        <h5 class="collection-header m-0">My Company</h5>
                                        <p><i>{{ Auth::user()->companyregis->company_name }}</i></p>
                                    </div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s12 center">
                                        <br><br>
                                        <h6 class="">Menunggu konfirmasi dari admin.</h6>
                                        <br><br><br>
                                    </div>
                                </div>
                            </li>
                        @elseif(Auth::user()->company_status == 'pending')
                            <li class="collection-item avatar">
                                <div class="row">
                                    <div class="col s9">
                                        <i class="fas fa-building cyan circle"></i>
                                        <h5 class="collection-header m-0">My Company</h5>
                                        <p><i>{{ Auth::user()->companyregis->company_name }}</i></p>
                                    </div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s12 center">
                                        <br><br>
                                        <h6 class="">Data perusahaan yang anda kirim belum memenuhi persyaratan.</h6>
                                        <a href="/company-registration/reupload" class="">Kirim ulang</a>
                                        <br><br><br>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                @if (Auth::user()->company_status == 'registered')
                <div id="company-update" class="card" style="display: none">
                    <a id="cancel-update" class="btn-floating btn-medium waves-effect waves-light red tooltipped" data-position="right" data-tooltip="Cancel" style="position: relative; right: 10px; bottom: 10px;">
                        <i class="material-icons">close</i>
                    </a>
                    <div class="card-content">
                        <span class="card-title center teal-text" style="position: relative; bottom: 30px;">Company Update</span>
                        <form id="company-update-form" action="/company-update" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="far fa-building cyan-text prefix"></i>
                                    <input id="perusahaan" type="text" name="nama_perusahaan" class="" value="{{ Auth::user()->company->company_name }}">
                                    <label for="perusahaan">Perusahaan</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="far fa-crown orange-text prefix" style="font-size: 26px"></i>
                                    <input id="pimpinan" type="text" name="nama_pimpinan" class="" value="{{ Auth::user()->company->leader_name }}">
                                    <label for="pimpinan">Pimpinan</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="far fa-id-card-alt teal-text prefix" style="font-size: 26px"></i>
                                    <input id="npwp" type="text" name="npwp" class="" value="{{ Auth::user()->company->npwp }}">
                                    <label for="npwp">NPWP</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="far fa-map-marker-alt deep-purple-text prefix"></i>
                                    <input id="alamat" type="text" name="alamat" class="" value="{{ Auth::user()->company->address }}">
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div style="text-align: center">
                                <button id="company-update-button" class="btn btn-small waves-effect waves-light" type="submit">update
                                    <i class="far fa-edit left"></i>
                                </button>
                                <div id="company-update-loading" class="preloader-wrapper small active" style="display: none">
                                    <div class="spinner-layer spinner-green-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                        <div class="circle"></div>
                                        </div><div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="col s12 m12 l7 xl8">
                <h5 class="orange-text text-darken-2 center"><i class="fas fa-history"></i>&nbsp; RECENT ACTIVITY</h5>
                <br>
                <div class="activity">
                    <div class="col s12 center" id="activity-load" style="display: none">
                        <br><br><br>
                        <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-red">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-yellow">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-green">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Recent Activity & Company --}}
@else
<section class="services">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4 class="orange-text text-darken-2 center">SERVICES</h4>
                <hr style="width: 250px; border-top: 3px solid #999;">
            </div>
        </div>
        <div class="row">
            <div class="services-card col s12 m12 l6">
                <img class="services-img" src="{{ asset('user/img/e-regis.png') }}">
                <h5 class="teal-text center">E - Registration</h5>
                <br>
                <div class="col s2"></div>
                <div class="services-content col s8">
                    <p class="teal-text center"><i class="fas fa-check"></i>&nbsp;&nbsp; Account Registration</p>
                    <p class="teal-text center"><i class="fas fa-check"></i>&nbsp;&nbsp; Company Registration</p>
                    <p class="teal-text center"><i class="fas fa-check"></i>&nbsp;&nbsp; Update Profile Data</p>
                </div>
            </div>
            <div class="services-card col s12 m12 l6">
                <img class="services-img" src="{{ asset('user/img/cs2.png') }}">
                <h5 class="teal-text center">Customer Service</h5>
                <br>
                <div class="col s2"></div>
                <div class="services-content col s8">
                    <p class="teal-text center"><i class="fas fa-check"></i>&nbsp;&nbsp; Submit Complaints</p>
                    <p class="teal-text center"><i class="fas fa-check"></i>&nbsp;&nbsp; Asking Information</p>
                    <p class="teal-text center"><i class="fas fa-check"></i>&nbsp;&nbsp; 24 Hour Service</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endif

<br><br>

@endsection
