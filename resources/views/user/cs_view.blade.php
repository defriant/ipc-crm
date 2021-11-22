@extends('layouts.user_ui')
@section('content')

<head>
    <title>Customer Care - IPC</title>
    <style>
        .pengaduan-wrapper {
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .admin{
            border-radius: 10px;
            
            background: #ffe0b2 ;
        }

        .saya{
            border-radius: 10px;
            
            background: #b2dfdb;
        }

        .balasan{
            padding: 10px
        }

        .nama{
            position: relative;
            left: 10px;
            bottom: 9px;
        }

        .tanggal{
            position: relative;
            float: right;
            color: #999;
            font-size: 12px;
        }

        .permasalahan-box{
            margin-top: -10px;
            border-radius: 10px;
            background: white;
            height: 200px;
        }

        .permasalahan{
            padding: 10px;
        }

        .btn-submit-balasan {
            float: right;
        }

        .btn-buat-pengaduan{
            float: right;
        }

    </style>
</head>

<div>
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col s12">
                <h5 class="orange-text text-darken-2 center">PENGADUAN SAYA</h5>
                <hr style="width: 320px; border-top: 3px solid #999;">
            </div>
        </div>
        <div class="pengaduan-wrapper">
            {{-- Detail Pengaduan --}}
            <div class="row">
                <hr class="col s12 m12 l12 xl10 offset-xl1" style="border: 1px solid rgb(179,179,179)">
            </div>
            <div class="row">
                <p class="col s12 m12 l12 xl10 offset-xl1">
                    <span class="blue-text text-darken-4"> No. </span> {{ $data->id }}
                    <br>
                    <span class="blue-text text-darken-4"> Tanggal Pengaduan : </span>{{ date("d M Y", strtotime($data->created_at)) }}
                    <br>
                    <span class="blue-text text-darken-4"> Perihal : </span>{{ $data->perihal }}
                </p>
                <p class="col s12 m12 l12 xl10 offset-xl1">
                    <span class="blue-text text-darken-4"> Nama Pengadu : </span> {{ $data->nama }}
                    <br>
                    <span class="blue-text text-darken-4"> Perusahaan : </span> {{ $data->perusahaan }}
                    <br>
                    <span class="blue-text text-darken-4"> Email : </span> {{ $data->email }}
                    <br>
                    <span class="blue-text text-darken-4"> Tanggal Permasalahan : </span> {{ $data->tanggal }}
                    <br>
                    <span class="blue-text text-darken-4"> Aplikasi : </span> {{ $data->aplikasi }}
                    <br>
                    <span class="blue-text text-darken-4"> Kegiatan : </span> {{ $data->kegiatan }}
                </p>
                <p class="col s12 m12 l12 xl10 offset-xl1">
                    <span class="blue-text text-darken-4"> Detail Permasalahan : </span>
                </p>
                <div class="permasalahan-box col s12 m12 l12 xl10 offset-xl1">
                    <div class="permasalahan">
                        {{ $data->permasalahan }}
                    </div>
                </div>
            </div>
            <div class="row">
                <hr class="col s12 m12 l12 xl10 offset-xl1" style="border: 1px solid rgb(179,179,179)">
            </div>

            {{-- Balasan --}}
            @foreach ($balasan as $b)
            @if($b->user_id != Auth::user()->id)
            <div class="row">
                <div class="admin col s12 m12 l6 xl6 offset-xl1">
                    <div class="row">
                        <div class="balasan">
                            <div class="col s12">
                                <img class="circle" src="{{ asset('user/img/favicon.png') }}" width="30px" height="30px" alt="">
                                <span class="nama">CS {{ $b->user->first_name }} &nbsp;|&nbsp; {{ date("d M Y", strtotime($b->created_at)) }}</span>
                                <span class="tanggal">{{ date("H:i", strtotime($b->created_at)) }}</span>
                            </div>
                            <div class="col s12">
                                {{ $b->balasan }}
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            @elseif($b->user_id == Auth::user()->id)
            <div class="row">
                <div class="saya col s12 m12 l6 offset-l6 xl6 offset-xl5">
                    <div class="row">
                        <div class="balasan">
                            <div class="col s12">
                                <img class="circle" src="{{ asset('user/profile_picture/'.Auth::user()->picture) }}" width="30px" height="30px" alt=""><span class="nama">Saya &nbsp;|&nbsp; {{ date("d M Y", strtotime($b->created_at)) }}</span>
                                <span class="tanggal">{{ date("H:i", strtotime($b->created_at)) }}</span>
                            </div>
                            <div class="col s12">
                                {{ $b->balasan }}
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            @endif
            @endforeach

            <br>

            @if($data->status == '0')
            <div class="row">
                <div class="col s12 m12 l12 xl10 offset-xl1 orange-text text-darken-3 center">
                    <i>* MENUNGGU BALASAN DARI PETUGAS KAMI</i><br>
                </div>
            </div>
            @elseif($data->status == '1')
            <div class="row">
                <div class="col s12 m12 l12 xl10 offset-xl1 orange-text text-darken-3 center">
                    <i>* MENUNGGU BALASAN DARI PETUGAS KAMI *</i><br>
                </div>
            </div>
            @elseif($data->status == '2')
            <div class="row">
                <div class="col s12 m12 l12 xl10 offset-xl1 orange-text text-darken-3">
                    <i>* Pengaduan akan ditutup secara otomatis selama 1x24 jam jika tidak ada balasan dari customer / pengguna jasa</i><br>
                    <i>* Anda dapat menutup pengaduan secara manual jika permasalahan telah selesai</i><br>
                    <i>* Anda dapat membalas tanggapan dari petugas kami jika permasalahan masih belum terselesaikan</i>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 xl10 offset-xl1">
                    <button class="btn-balas btn btn-small orange waves-effect waves-light" type="submit" name="action">Balas Tanggapan
                        <i class="material-icons left">reply</i>
                    </button>
                    <a href="/tutup-pengaduan/{{ $data->id }}" class="btn-tutup waves-effect waves-light btn btn-small teal"><i class="material-icons left">check</i>Tutup Pengaduan</a>
                </div>
            </div>
            <form class="balas-tanggapan" action="/balas-tanggapan/{{ $data->id }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl10 offset-xl1">
                        <h6 class="orange-text text-darken-3">Balas Tanggapan</h6>
                        <textarea id="textarea1" class="materialize-textarea" name="balasan"></textarea>
                    </div>
                    <div class="col s12 m12 l12 xl10 offset-xl1">
                        <button class="btn-submit-balasan btn waves-effect waves-light" type="submit">Submit Balasan
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
            @elseif($data->status == '3')
            <div class="row">
                <div class="col s12 m12 l12 xl10 offset-xl1 orange-text text-darken-3 center">
                    <i>* MENUNGGU BALASAN DARI PETUGAS KAMI *</i><br>
                </div>
            </div>
            @elseif($data->status == '4')
            <div class="row">
                <div class="col s12 m12 l12 xl10 offset-xl1 green-text text-darken-3 center">
                    <i>* PENGADUAN INI TELAH SELESAI *</i><br>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
<script>
    $('.btn-balas').on('click', function(){
        $('.balas-tanggapan').toggle('slide');
        $('.btn-tutup').toggle('slide');
    })
</script>
@endsection

