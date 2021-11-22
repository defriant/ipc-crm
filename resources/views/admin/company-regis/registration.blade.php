@extends('layouts.admin_ui')
@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Company Registration</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- Waiting List --}}
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Waiting List</h3>
                                <div class="card-tools">
                                    <button type="button" id="wl-refresh" class="btn btn-default btn-sm"><i id="wlist-load" class="fas fa-sync-alt"></i></button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover">
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
                                            } else if ($bulan <= 12) {
                                                $waktu = $bulan.' Bulan yang lalu';
                                            } else {
                                                $waktu = $tahun.' Tahun yang lalu';
                                            }
                                            return $waktu;
                                        }
                                    @endphp
                                        <tbody id="company_regis_data">
                                        @foreach ($companyRegis as $companyRegis)
                                        <tr class="link" data-href="/registration/{{$companyRegis->id}}" style="cursor: pointer;">
                                            <td>
                                                <span class="badge badge-danger">New</span>
                                            </td>
                                            <td class="mailbox-name">
                                                {{ $companyRegis->company_name }}
                                            </td>
                                            <td class="mailbox-date">{{ waktu_lalu($companyRegis->updated_at) }}</td>
                                        </tr>    
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer p-0">
                                <div class="mailbox-controls">
                                    <div class="float-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm"><i
                                                    class="fas fa-chevron-left"></i></button>
                                            <button type="button" class="btn btn-default btn-sm"><i
                                                    class="fas fa-chevron-right"></i></button>
                                        </div>
                                        <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                </div>
                            </div>
                            <div class="overlay" style="display: none;"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
                        </div>
                    </div>

                    {{-- Data Pendaftaran --}}
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div id="data-pendaftaran">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script type="text/javascript" src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
@endsection