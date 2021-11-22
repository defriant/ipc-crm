<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Complaints</h3>
        <div class="card-tools">
            {{-- <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Search Mail">
                <div class="input-group-append">
                    <div class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div> --}}
        </div>
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
                <tbody id="all-complaint-data">
                    @foreach ($allComplaints as $all)
                        @if ($all->status == '0')
                        <tr class="link" data-href="/complaint/{{ $all->id }}" style="cursor: pointer;">
                            <td><span class="badge badge-danger">New</span></td>
                            <td>{{ $all->id }}</td>
                            <td>User : {{ $all->user->first_name.' '.$all->user->last_name}}</td>
                            <td>{{ $all->perihal }}</td>
                            <td>{{ date("d M Y", strtotime($all->created_at)) }}</td>
                            <td>Menunggu Tanggapan</td>
                            <td>-</td>
                        </tr>
                        @elseif($all->status == '4')
                        <tr class="link" data-href="/complaint/{{ $all->id }}" style="cursor: pointer; background-color: rgb(245, 245, 245)">
                            <td></td>
                            <td>{{ $all->id }}</td>
                            <td>User : {{ $all->user->first_name.' '.$all->user->last_name}}</td>
                            <td>{{ $all->perihal }}</td>
                            <td>{{ date("d M Y", strtotime($all->created_at)) }}</td>
                            <td>Selesai</td>
                            <td>{{ $all->admin_nama }}</td>
                        </tr>
                        @else
                        <tr class="link" data-href="/complaint/{{ $all->id }}" style="cursor: pointer; background-color: rgb(245, 245, 245)">
                            <td></td>
                            <td>{{ $all->id }}</td>
                            <td>User : {{ $all->user->first_name.' '.$all->user->last_name}}</td>
                            <td>{{ $all->perihal }}</td>
                            <td>{{ date("d M Y", strtotime($all->created_at)) }}</td>
                            <td>Ditanggapi</td>
                            <td>{{ $all->admin_nama }}</td>
                        </tr>
                        @endif
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
            {{-- <div class="float-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i
                            class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i
                            class="fas fa-chevron-right"></i></button>
                </div>
            </div> --}}
            <!-- /.float-right -->
        </div>
    </div>
    <div class="overlay" style="display: none;"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
</div>