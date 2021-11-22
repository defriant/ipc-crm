<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">No. {{ $complaint->id }}</h3>
        <span
            class="mailbox-read-time float-right">{{ date("d M Y H:i", strtotime($complaint->created_at)) }}</span>
        </h6>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="mailbox-read-info">
            <h6>Perihal : {{ $complaint->perihal }}</h6>
            <h6>Dari Pengguna : {{ $complaint->user->first_name.' '.$complaint->user->last_name }}
            </h6>
            <h6>Nama Pengadu : {{ $complaint->nama }}</h6>
            <h6>Perusahaan / Instansi : {{ $complaint->perusahaan }}</h6>
            <h6>Email : {{ $complaint->email }}</h6>
            <h6>Tanggal Permasalahan : {{ date("d M Y", strtotime($complaint->tanggal)) }}</h6>
            <h6>Aplikasi : {{ $complaint->aplikasi }}</h6>
            <h6>Kegiatan : {{ $complaint->kegiatan }}</h6>
            <br>
            <h6>Detail Permasalahan :</h6>
        </div>
        <!-- /.mailbox-controls -->
        <div class="mailbox-read-message">
            <p>{{ $complaint->permasalahan }}</p>
        </div>
        <!-- /.mailbox-read-message -->
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer -->
    <div class="card-footer">
        <div class="float-right">
            @if ($complaint->status == '0')
            <button type="button" class="follup btn btn-default"><i class="fas fa-reply"></i>
                &nbsp; Follow Up</button>
            @else

            @endif
        </div>
    </div>
    <!-- /.card-footer -->
</div>

<!-- /.card -->
@if ($complaint->status == '0')
    <div class="card" id="balas-pengaduan" style="display: none">
        <div class="card-header">
            <form id="form-balas">
                <div class="form-group">
                    <label>Balas Pengaduan :</label>
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id" value="{{ $complaint->id }}">
                    <textarea class="form-control" id="balasan" name="balasan" placeholder="..."
                        style="margin-top: 0px; margin-bottom: 0px; height: 100px; resize: none;"></textarea>
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-success right"><i
                            class="fas fa-paper-plane"></i>&nbsp; Kirim Balasan</button>
                </div>
            </form>
        </div>
        <div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
    </div>

@elseif($complaint->status == '2')
    @if ($balasan->total() == 0)

    @else
    <div class="card direct-chat direct-chat-warning">
        <div class="card-body">
            <div class="balasan">
                @foreach ($balasan as $b)
                @if ($b->user_id == Auth::user()->id)
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">CS {{ $b->user->first_name }}</span>
                        <span
                            class="direct-chat-timestamp float-right">{{ date("d M Y H:i", strtotime($b->created_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ asset('user/img/favicon.png') }}"
                        alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $b->balasan }}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                @else
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">{{ $b->user->first_name.' '.$b->user->last_name }}</span>
                        <span class="direct-chat-timestamp float-left">{{ date("d M Y H:i", strtotime($b->created_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ asset('user/profile_picture/'.$b->user->picture) }}"
                        alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $b->balasan }}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div style="text-align: center; padding-bottom: 20px; color: rgb(228, 91, 0);">
        <h6><b><i>* DITANGGAPI OLEH {{ $complaint->admin_nama }} *</i></b></h6>
        <h6><b><i>* JIKA TIDAK ADA BALASAN DARI CUSTOMER SELAMA 1x24 JAM, MAKA PENGADUAN INI AKAN DITUTUP SECARA OTOMATIS *</i></b></h6>
    </div>
    @endif

@elseif($complaint->status == '4')
    @if ($balasan->total() == 0)

    @else
    <div class="card direct-chat direct-chat-warning">
        <div class="card-body">
            <div class="balasan">
                @foreach ($balasan as $b)
                @if ($b->user_id == Auth::user()->id)
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">CS {{ $b->user->first_name }}</span>
                        <span
                            class="direct-chat-timestamp float-right">{{ date("d M Y H:i", strtotime($b->created_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ asset('user/img/favicon.png') }}"
                        alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $b->balasan }}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                @else
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">{{ $b->user->first_name.' '.$b->user->last_name }}</span>
                        <span class="direct-chat-timestamp float-left">{{ date("d M Y H:i", strtotime($b->created_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ asset('user/profile_picture/'.$b->user->picture) }}"
                        alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $b->balasan }}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div style="text-align: center; padding-bottom: 20px; color: rgb(0, 204, 0);">
        <h6><b><i>* PENGADUAN INI TELAH DISELESAIKAN *</i></b></h6>
    </div>
    @endif
@else

    @if ($balasan->total() == 0)

    @else
    <div class="card direct-chat direct-chat-warning">
        <div class="card-body">
            <div class="balasan">
                @foreach ($balasan as $b)
                @if ($b->user_id == Auth::user()->id)
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">CS {{ $b->user->first_name }}</span>
                        <span
                            class="direct-chat-timestamp float-right">{{ date("d M Y H:i", strtotime($b->created_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ asset('user/img/favicon.png') }}"
                        alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $b->balasan }}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                @else
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">{{ $b->user->first_name.' '.$b->user->last_name }}</span>
                        <span class="direct-chat-timestamp float-left">{{ date("d M Y H:i", strtotime($b->created_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ asset('user/profile_picture/'.$b->user->picture) }}"
                        alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $b->balasan }}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if ($complaint->admin_id == Auth::user()->id)
    <div class="card" id="balas-pengaduan">
        <div class="card-header">
            <form id="form-balas">
                <div class="form-group">
                    <label>Balas Pengaduan :</label>
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id" value="{{ $complaint->id }}">
                    <textarea class="form-control" id="balasan" name="balasan" placeholder="..."
                        style="margin-top: 0px; margin-bottom: 0px; height: 100px; resize: none;"></textarea>
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-success right"><i
                            class="fas fa-paper-plane"></i>&nbsp; Kirim Balasan</button>
                </div>
            </form>
        </div>
        <div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
    </div>
    @else
    <div style="text-align: center; padding-bottom: 20px; color: rgb(228, 91, 0);">
        <h6><b><i>* DITANGGAPI OLEH {{ $complaint->admin_nama }} *</i></b></h6>
    </div>
    @endif
@endif

<input type="hidden" id="pengaduan_id" value="{{ $complaint->id }}">