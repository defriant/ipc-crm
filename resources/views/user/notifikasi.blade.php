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
            $waktu = $detik.' Detik yang lalu';
        } else if ($menit <= 60) {
            $waktu = $menit.' Menit yang lalu';
        } else if ($jam <= 24) {
            $waktu = $jam.' Jam yang lalu';
        } else if ($hari <= 7) {
            $waktu = $hari.' Hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu.' Minggu yang lalu';
        } else {
            $waktu = date("d M Y", strtotime($timestamp));
        }
        return $waktu;
    }
@endphp
@foreach ($notif as $n)
    @if ($n->is_read == 0)
        <li class="">
            <a href="{{ $n->url }}" style="background: transparent;">
                <span class="material-icons icon-bg-circle yellow accent-4 small">notifications_none</span> <span class="grey-text text-darken-2" style="font-size: 15px !important;">{{ $n->notif }}</span></a>
            <time class="media-meta grey-text text-darken-2">{{ waktu_lalu($n->created_at) }}</time>
        </li>
    @else
        <li class="grey lighten-4">
            <a href="{{ $n->url }}" style="background: transparent;">
                <span class="material-icons icon-bg-circle cyan small">notifications_none</span> <span class="grey-text text-darken-2" style="font-size: 15px !important;">{{ $n->notif }}</span></a>
            <time class="media-meta grey-text text-darken-2">{{ waktu_lalu($n->created_at) }}</time>
        </li>
    @endif
@endforeach
