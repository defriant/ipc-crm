<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Complaints</h3>

        {{-- <div class="card-tools">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Search Mail">
                <div class="input-group-append">
                    <div class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="table-responsive mailbox-messages">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>No. Pengaduan</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>CS</th>
                    </tr>
                </thead>
                <tbody id="new-complaint-data">
                    @foreach ($Complaints as $c)
                    <tr class="link" data-href="/complaint/{{ $c->id }}" style="cursor: pointer;">
                        <td><span class="badge badge-danger">New</span></td>
                        <td>{{ $c->id }}</td>
                        <td>User : {{ $c->user->first_name.' '.$c->user->last_name}}</td>
                        <td>{{ $c->perihal }}</td>
                        <td>{{ date("d M Y", strtotime($c->created_at)) }}</td>
                        <td>Menunggu Tanggapan</td>
                        <td>-</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /.table -->
        </div>
        <!-- /.mail-box-messages -->
    </div>
    <!-- /.card-body -->
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