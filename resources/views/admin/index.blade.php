@extends('layouts.admin_ui')
@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Companies</span>
                                <span class="info-box-number">
                                    {{ $new_company->count() }}
                                    <small> | Last 24 hours</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">All Companies</span>
                                <span class="info-box-number">{{ $company->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i
                                    class="fas fa-user-headset"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Complaints</span>
                                <span class="info-box-number">
                                    {{ $new_complaint->count() }}
                                    <small> | Last 24 hours</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-headset"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">All Complaints</span>
                                <span class="info-box-number">{{ $complaint->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <!-- USERS LIST -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">All User</h3>

                                <div class="card-tools">
                                    {{-- <span class="badge badge-danger">8 New Members</span> --}}

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div id="user-activity-data">
                                    @include('admin.user_activity_data')
                                </div>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <div class="col-md-8">
                        <div id="company-view-data">
                            @include('admin.all-company')
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
</div>

@endsection

<script src="{{ asset('admins/plugins/jquery/jquery.min.js') }}"></script>
<script>
    function user_next_page() {
        var url = $('#user-next-page').data('href');
        $.ajax({
            url: url,
            type: 'get',
            success: function (data) {
                $('#user-activity-data').empty();
                $('#user-activity-data').html(data);
            }
        })
    }

    function user_previous_page() {
        var url = $('#user-previous-page').data('href');
        $.ajax({
            url: url,
            type: 'get',
            success: function (data) {
                $('#user-activity-data').empty();
                $('#user-activity-data').html(data);
            }
        })
    }

    function user_activity() {
        var page = $('#user-page-href').val().split('page=')[1];
        $.ajax({
            url: '/user-activity?page=' + page,
            type: 'get',
            success: function (data) {
                $('#user-activity-data').empty();
                $('#user-activity-data').html(data);
            }
        })
    }

    setInterval(user_activity, 5000);

    function company_next_page() {
        var url = $('#company-next-page').data('href');
        $.ajax({
            url: url,
            type: 'get',
            success: function (data) {
                $('#company-view-data').empty();
                $('#company-view-data').html(data);
            }
        })
    }

    function company_previous_page() {
        var url = $('#company-previous-page').data('href');
        $.ajax({
            url: url,
            type: 'get',
            success: function (data) {
                $('#company-view-data').empty();
                $('#company-view-data').html(data);
            }
        })
    }

    function company_view(id){
        $('#company-loading').show();
        $.ajax({
            type:'get',
            url:'/company-view/'+id,
            success:function(data){
                $('#company-loading').hide();
                $('#company-view-data').html(data);
            }
        })
    }

    function company_back(){
        $('#company-loading').show();
        $.ajax({
            type:'get',
            url:'/all-company',
            success:function(data){
                $('#company-loading').hide();
                $('#company-view-data').html(data);
            }
        })
    }

</script>
