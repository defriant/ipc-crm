@extends('layouts.admin_ui')
@section('content')

<head>
    <style>
        .selected{
            background-color: rgb(218, 218, 218);
        }

        .loading{
            padding-left: 20px;
            display: none;
        }

        .balasan {
            padding: 10px;
        }
    </style>
</head>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customer Complaints</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Folders</h3>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a id="newcomplaint" class="nav-link complaint" style="cursor: pointer;">
                                        <i class="fas fa-envelope"></i>&nbsp;&nbsp; New Complaints <span id="load1" class="loading"><i class="fas fa-sync-alt fa-spin"></i></span>
                                        @if($newComplaint->total() > 0)
                                        <span class="badge bg-danger float-right" id="new-complaint-count">{{ $newComplaint->total() }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a id="allcomplaint" class="nav-link complaint" style="cursor: pointer;">
                                        <i class="fas fa-inbox"></i>&nbsp;&nbsp; All Complaints <span id="load2" class="loading"><i class="fas fa-sync-alt fa-spin"></i></span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="ongoing" class="nav-link complaint" style="cursor: pointer;">
                                        <i class="fas fa-spinner"></i>&nbsp;&nbsp;&nbsp; On Going <span id="load3" class="loading"><i class="fas fa-sync-alt fa-spin"></i></span>
                                        &nbsp;&nbsp;&nbsp;
                                        @if($ongoing_balas->total() > 0)
                                        <span class="badge badge-danger new-reply">New</span>
                                        @endif
                                        @if($ongoing->total() > 0)
                                        <span class="badge bg-primary float-right" id="ongoing-complaint-count">{{ $ongoing->total() }}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9" id="complaint">
                    
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
</div>

<script type="text/javascript" src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>

@endsection
