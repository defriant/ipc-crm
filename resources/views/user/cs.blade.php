@extends('layouts.user_ui')
@section('content')

<head>
    <title>Customer Care - IPC</title>
    <style>
        .cs-table {
            margin-top: 100px;
            margin-bottom: 50px;
        }

        .btn-submit {
            margin-top: 25px;
            float: right;
        }

        .btn-buat-pengaduan{
            text-align: center;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .progress{
            opacity: 0;
        }

        .progress.show{
            opacity: 1;
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
        <div class="progress" style="position: relative; top: 90px; background-color: #fff3e0;">
            <div class="indeterminate orange darken-2"></div>
        </div>
        <div class="cs-data">
            <table class="centered cs-table highlight">
                <thead>
                    <tr>
                        <th>No. Pengaduan</th>
                        <th>Perihal</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Status</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr class="link" data-href="/customer-service/{{ $d->id }}" style="cursor: pointer;">
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->perihal }}</td>
                        <td>{{ date("d M Y", strtotime($d->created_at)) }}</td>
                        @if($d->status == 0)
                        <td>Menunggu</td>
                        @elseif($d->status == 1)
                        <td>Ditangani</td>
                        @elseif($d->status == 2)
                        <td>Dibalas</td>
                        @elseif($d->status == 3)
                        <td>Menunggu Balasan</td>
                        @elseif($d->status == 4)
                        <td>Selesai</td>
                        @endif

                        @if ($d->status = 0)
                        <td> - </td>
                        @else
                        <td> {{ $d->admin_nama }} </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <ul class="pagination center">
                {{-- Previous Page Link --}}
                @if ($data->onFirstPage()) 
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                @else
                <li class="waves-effect"><a href="{{ $data->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
                @endif
            
                {{-- Page Number Links --}}
                @for($i=1; $i<=$data->lastPage(); $i++)
                    
                    @if($i==$data->currentPage())
                        <li id="{{$i}}" class="halaman active"><a id="{{$i}}" href="?page={{$i}}">{{$i}}</a></li>
                    @else
                        <li id="{{$i}}" class="halaman waves-effect"><a id="{{$i}}" href="?page={{$i}}">{{$i}}</a></li>
                    @endif
                @endfor
            
                {{-- Next Page Link --}}
                @if ($data->hasMorePages())
                <li class="waves-effect"><a href="{{ $data->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
                @else
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                @endif
            </ul>
        </div>
        <div class="row">
            <div class="btn-buat-pengaduan">
                <a href="/buat-pengaduan" class="waves-effect waves-light btn"><i class="material-icons left">add_circle</i>Buat Pengaduan</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
<script>
    $(window).on('load', function(){
        tr_link();
        paginate();
    })

    function tr_link(){
        $('.link').click(function(){
            window.location = $(this).data("href");
        });
    }

    function paginate(){
        $('.pagination li a').on('click', function(e){
            $('.progress').addClass('show');
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $.ajax({
                url:'/customer-service/page?page='+page,
                success:function(data){
                    $('.cs-data').html(data);
                    $('li.halaman').removeClass('active');
                    $('li#'+page).addClass('active');
                    tr_link();
                    paginate();
                    $('.progress').removeClass('show');
                }
            });
        })
    }  
</script>
@endsection

