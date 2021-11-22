@extends('layouts.user_ui')
@section('content')

<head>
<title>Customer Care - IPC</title>
<style>
    .cs-form {
        margin-top: 100px;
        margin-bottom: 100px;
    }

    .submit-pengaduan {
        margin-top: 25px;
        float: right;
    }

    .warning{
        border-left: 6px solid #f57c00;
        height: auto;
        padding-left: 10px;
        padding-top: 13px;
        padding-bottom: 1px;
        background-color: #fff7ef;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
    }
</style>
</head>


<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col s12">
            <h5 class="orange-text text-darken-2 center">BUAT PENGADUAN</h5>
            <hr style="width: 320px; border-top: 3px solid #999;">
        </div>
    </div>
    @if (Auth::user()->company_status == 'registered' && $cek_pengaduan->total() == 0)
    <form id="buat-pengaduan" action="/buat-pengaduan/submit" method="POST" class="cs-form">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Nama Pengadu</h6>
                <input id="nama" type="text" class="input-form" name="nama" value="{{ Auth::user()->first_name.' '.Auth::user()->last_name }}">
                <span class=" helper-text"><i>* Masukan Informasi Nama Pengadu</i></span>
            </div>
            <div class="input-field col s12 m12 l5 xl4">
                <h6 class="blue-text text-darken-4">Perusahaan / Instansi</h6>
                <input id="perusahaan" type="text" class="input-form" name="perusahaan" value="{{ Auth::user()->company->company_name }}">
                <span class="helper-text"><i>* Masukan Informasi Nama Perusahaan / Instansi</i></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Email Pengadu</h6>
                <input id="email" type="email" class="input-form" name="email" value="{{ Auth::user()->email }}">
                <span class="helper-text"><i>* Harap Gunakan Email Aktif</i></span>
            </div>
            <div class="input-field col s12 m12 l5 xl4">
                <h6 class="blue-text text-darken-4">Perihal</h6>
                <input id="perihal" type="text" class="input-form" name="perihal">
                <span class="helper-text"><i>* Perihal Permasalahan</i></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Tanggal Permasalahan</h6>
                <input id="tanggal_permasalahan" class="input-form tanggalPermasalahan" type="text" class="" name="tanggal" readonly>
                <span class="helper-text"><i>* Tanggal Terjadinya Permasalahan</i></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Aplikasi</h6>
                <select id="aplikasi" name="aplikasi">
                    <option disabled selected value=""></option>
                    <option value="Opus">Opus</option>
                    <option value="Billing">Billing</option>
                    <option value="Octopus">Octopus</option>
                </select>
                
            </div>
            <div class="input-field col s12 m12 l5 xl4">
                <h6 class="blue-text text-darken-4">Kegiatan</h6>
                <select id="kegiatan" name="kegiatan">
                    <option disabled selected value=""></option>
                    <option value="Export">Export</option>
                    <option value="Import">Import</option>
                    <option value="Batal Muat">Batal Muat</option>
                </select>
                
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l10 offset-l1 xl8 offset-xl2">
                <h6 class="blue-text text-darken-4">Permasalahan</h6>
                <textarea id="permasalahan" class="input-form materialize-textarea" name="permasalahan"></textarea>
                <span class="helper-text"><i>* Jelaskan Detail Permasalahan</i></span>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l10 offset-l1 xl8 offset-xl2">
                <button id="btn-submit" class="submit-pengaduan btn waves-effect waves-light" type="submit">Submit Pengaduan
                    <i class="material-icons right">send</i>
                </button>
                <div id="submit-loading" class="submit-pengaduan" style="display: none">
                    <div id="company-update-loading" class="preloader-wrapper small active">
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
                    <span class="green-text" style="position: relative; left: 10px; bottom: 12px;">Mengirim...</span>
                </div>
            </div>
        </div>
    </form>

    @else
    <br><br>
    @if ($cek_pengaduan->total() > 0)
    <div class="row">
        <div class="col s12 m12 l10 offset-l1 xl8 offset-xl2">
            <div class="warning">
                <div class="row">
                    <div class="col s1 center red-text text-lighten-2">
                        <i class="far fa-exclamation-triangle" style="position: relative; top: 4px; font-size: 20px;"></i>
                    </div>
                    <div class="col s11">
                        <h6 class="red-text text-lighten-2">Ada pengaduan yang belum diselesaikan, selesaikan terlebih dahulu untuk membuat pengaduan selanjutnya.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(Auth::user()->company_status != 'registered')
    <div class="row">
        <div class="col s12 m12 l10 offset-l1 xl8 offset-xl2">
            <div class="warning">
                <div class="row">
                    <div class="col s1 center red-text text-lighten-2">
                        <i class="far fa-exclamation-triangle" style="position: relative; top: 4px; font-size: 20px;"></i>
                    </div>
                    <div class="col s11">
                        <h6 class="red-text text-lighten-2">Tidak dapat membuat pengaduan, akun anda belum memenuhi persyaratan.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br><br>
    <form action="/buat-pengaduan/submit" method="POST" style="margin-bottom: 100px">
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Nama Pengadu</h6>
                <input id="nama" type="text" class="" name="nama" disabled>
                <span class="helper-text"><i>* Masukan Informasi Nama Pengadu</i></span>
            </div>
            <div class="input-field col s12 m12 l5 xl4">
                <h6 class="blue-text text-darken-4">Perusahaan / Instansi</h6>
                <input id="perusahaan" type="text" class="" name="perusahaan" disabled>
                <span class="helper-text"><i>* Masukan Informasi Nama Perusahaan / Instansi</i></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Email Pengadu</h6>
                <input id="email" type="email" class="" name="email" disabled>
                <span class="helper-text"><i>* Harap Gunakan Email Aktif</i></span>
            </div>
            <div class="input-field col s12 m12 l5 xl4">
                <h6 class="blue-text text-darken-4">Perihal</h6>
                <input id="tanggal_permasalahan" type="text" class="" name="perihal" disabled>
                <span class="helper-text"><i>* Perihal Permasalahan</i></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Tanggal Permasalahan</h6>
                <input id="tanggal_permasalahan" class="tanggalPermasalahan" type="text" class="" name="tanggal" readonly disabled>
                <span class="helper-text"><i>* Tanggal Terjadinya Permasalahan</i></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l5 offset-l1 xl4 offset-xl2">
                <h6 class="blue-text text-darken-4">Aplikasi</h6>
                <select name="aplikasi">
                    <option disabled selected></option>
                    <option value="Opus">Opus</option>
                    <option value="Billing">Billing</option>
                    <option value="Octopus">Octopus</option>
                </select>
                
            </div>
            <div class="input-field col s12 m12 l5 xl4">
                <h6 class="blue-text text-darken-4">Kegiatan</h6>
                <select name="kegiatan">
                    <option disabled selected></option>
                    <option value="Export">Export</option>
                    <option value="Import">Import</option>
                    <option value="Batal Muat">Batal Muat</option>
                </select>
                
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l10 offset-l1 xl8 offset-xl2">
                <h6 class="blue-text text-darken-4">Permasalahan</h6>
                <textarea id="textarea1" class="materialize-textarea" name="permasalahan" disabled></textarea>
                <span class="helper-text"><i>* Jelaskan Detail Permasalahan</i></span>
            </div>
        </div>
    </form>
    @endif
</div>


@endsection
