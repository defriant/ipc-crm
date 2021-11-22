@php
    function waktu_lalu($timestamp){ // membuat fungsi menghitung waktu
        $selisih = time() - strtotime($timestamp) ;
        $detik = $selisih ;
        $menit = round($selisih / 60 );
        $jam = round($selisih / 3600 );
        $hari = round($selisih / 86400 );
        $minggu = round($selisih / 604800 );
        $bulan = round($selisih / 2419200 );
        $tahun = round($selisih / 29030400 );
        if ($detik <= 60) {
            $waktu = 'Baru saja';
        } else if ($menit <= 60) {
            $waktu = 'Baru saja';
        } else if ($jam <= 24) {
            $waktu = 'Hari ini';
        } else if ($hari <= 7) {
            $waktu = $hari.' Hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu.' Minggu yang lalu';
        } else if ($bulan <= 12) {
            $waktu = date("d M Y", strtotime($timestamp));
        } else {
            $waktu = date("d M Y", strtotime($timestamp));
        }
        return $waktu;
    }
@endphp
@if ($data->total() > 0)
    @foreach ($data as $d)
        @if ($d->jenis == 'cs')
            <div class="row">
                <div class="col s2 mt-2 center-align">
                    <i class="fas fa-user-headset white-text icon-bg-color pink lighten-2"></i>
                </div>
                <div class="col s8 mt-2">
                    <a href="{{ $d->url }}" class="pink-text ">{{ waktu_lalu($d->created_at) }}</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300">{{ $d->aktifitas }}</p>
                </div>
                <div class="col s2 mt-2">
                    <span class="light activity-time">{{ date("H:i", strtotime($d->created_at)) }}</span>
                </div>
            </div>
        @elseif($d->jenis == 'registrasi')
            <div class="row">
                <div class="col s2 mt-2 center-align">
                    <i class="fas fa-clipboard-list white-text icon-bg-color teal lighten-2"></i>
                </div>
                <div class="col s8 mt-2">
                    <a href="{{ $d->url }}" class="teal-text ">{{ waktu_lalu($d->created_at) }}</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300">{{ $d->aktifitas }}</p>
                </div>
                <div class="col s2 mt-2">
                    <span class="light activity-time">{{ date("H:i", strtotime($d->created_at)) }}</span>
                </div>
            </div>
        @elseif($d->jenis == 'update')
            <div class="row">
                <div class="col s2 mt-2 center-align">
                    <i class="fal fa-edit white-text icon-bg-color deep-purple lighten-2"></i>
                </div>
                <div class="col s8 mt-2">
                    <a href="{{ $d->url }}" class="deep-purple-text ">{{ waktu_lalu($d->created_at) }}</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300">{{ $d->aktifitas }}</p>
                </div>
                <div class="col s2 mt-2">
                    <span class="light activity-time">{{ date("H:i", strtotime($d->created_at)) }}</span>
                </div>
            </div>
        @endif
    @endforeach
@else
<p class="center grey-text text-darken-1" style="padding-top: 30px; padding-bottom: 30px;"><i>BELUM ADA AKTIFITAS</i></p>
@endif

@if ($data->hasMorePages())
    <div id="muat-selanjutnya" class="row" style="padding-top: 10px; padding-bottom: 15px;">
        <div class="col s12 center" >
            <a id="load-next" href="{{ $data->nextPageUrl() }}" class="orange-text text-darken-2"><i class="fas fa-angle-down"></i>&nbsp;&nbsp; Muat selanjutnya</a>
            <div id="preload-next" class="preloader-wrapper small active" style="display: none">
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
@endif

