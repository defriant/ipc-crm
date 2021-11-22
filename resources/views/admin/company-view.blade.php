
    <div class="card card-primary card-outline">
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <button type="button" onclick="company_back()" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                <span class="mailbox-read-time float-right">Tanggal Bergabung | {{ date("d M Y", strtotime($data->created_at)) }}</span>
            </div>
            <div class="mailbox-read-message">
                <br>
                <div class="container">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-6">
                            <h3><i><u> {{ $data->company_name }} </u></i></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong style="color: rgb(59, 59, 59)"><i class="fas fa-crown mr-1"></i> Nama Pimpinan</strong>
                            <p class="text-muted">
                                {{ $data->leader_name }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong style="color: rgb(59, 59, 59)"><i class="far fa-credit-card mr-1"></i> NPWP</strong>
                            <p class="text-muted">
                                {{ $data->npwp }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong style="color: rgb(59, 59, 59)"><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted">
                                {{ $data->address }}
                            </p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-6">
                            <strong style="color: rgb(59, 59, 59)"><i class="fas fa-user mr-1"></i> Pendaftar</strong>
                            <p class="text-muted">
                                {{ $data->user->first_name.' '.$data->user->last_name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div id="company-loading" class="overlay" style="display: none;"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
    </div>
    <!-- /.card -->


