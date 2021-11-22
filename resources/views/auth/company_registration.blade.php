@extends('layouts.register_ui')
@section('content')

<head>
    <title>Company Registration</title>
    <style>
        .a{
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: -30px;
            padding-top: 70px;
        }
        @media (min-width: 910px){
            .button-submit{
                padding-top: 118px;
                padding-left: 150px;
            } 
        }
        @media (min-width: 769px) and (max-width: 909px){
            .button-submit{
                padding-top: 90px;
                padding-left: 80px;
            } 
        }
        .vl{
            border-left: 6px solid #f57c00;
            height: 35px;
            padding-left: 10px;
            background-color:#fcf2e8;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
</head>

<div class="main">
    <section class="signup">
        <div class="container">
            <div class="a">
                <h5 class="center blue-text text-darken-2">DAFTARKAN PERUSAHAANMU</h5>
            </div>
            <div class="signup-content">
                <div class="signup-form">
                    <div class="vl">
                        <p>INFORMASI</p>
                    </div>
                    <br>
                    <form method="POST" action="/company-registration/add" class="register-form" id="regis-perusahaan" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="namaPimpinan" type="text" name="namaPimpinan" class="@error('namaPimpinan') invalid @enderror" value="{{ old('namaPimpinan') }}">
                                <label for="namaPimpinan">Nama Pimpinan</label>
                                @error('namaPimpinan')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">location_city</i>
                                <input id="namaPerusahaan" type="text" name="namaPerusahaan" class="@error('namaPerusahaan') invalid @enderror" value="{{ old('namaPerusahaan') }}">
                                <label for="namaPerusahaan">Nama Perusahaan</label>
                                @error('namaPerusahaan')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">sd_card</i>
                                <input id="npwp" type="text" name="npwp" class="@error('npwp') invalid @enderror" value="{{ old('npwp') }}">
                                <label for="npwp">NPWP</label>
                                @error('npwp')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">streetview</i>
                                <textarea id="textarea1" name="alamat" class="materialize-textarea @error('alamat') invalid @enderror">{{ old('alamat') }}</textarea>
                                <label for="textarea1">Alamat Perusahaan</label>
                                @error('alamat')
                                    <span class="helper-text red-text"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <a href="/" class="btn waves-effect waves-light blue darken-2">lain kali</a>
                        </div>
                        <br>
                </div>
                <div class="signin-form">
                    <div class="vl">
                        <p>LAMPIRAN</p>
                    </div>
                    <br>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn orange darken-2">
                                <span>File</span>
                                <input type="file" name="suratPermohonan">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path @error('suratPermohonan') invalid @enderror" name="suratPermohonan" type="text" placeholder="Surat Permohonan">
                                <span class="helper-text"><i>format : doc, docx, pdf</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn orange darken-2">
                                <span>File</span>
                                <input type="file" name="fotoNpwp">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path @error('fotoNpwp') invalid @enderror" name="fotoNpwp" type="text" placeholder="Foto NPWP">
                                <span class="helper-text"><i>format : image (jpg, jpeg, png)</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-button button-submit">
                        <button type="submit" class="btn waves-effect waves-light blue darken-2">daftar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection