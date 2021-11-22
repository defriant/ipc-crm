
    <div class="card card-primary card-outline">
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <p>From user : {{ $data->user->first_name.' '.$data->user->last_name }}
                    <span class="mailbox-read-time float-right">{{ date("d M Y", strtotime($data->created_at)) }}</span></p>
            </div>
            <div class="mailbox-read-message">
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <strong><i class="fas fa-crown mr-1"></i> Nama Pimpinan</strong>
                            <p class="text-muted">
                                {{ $data->leader_name }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong><i class="fas fa-building mr-1"></i> Nama Perusahaan</strong>
                            <p class="text-muted">
                                {{ $data->company_name }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted">
                                {{ $data->address }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white">
            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                    <span class="mailbox-attachment-icon has-img"><img
                            src="{{ asset('registration/requirement/npwp/'.$data->foto_npwp) }}"></span>
                    <div class="mailbox-attachment-info">
                        <a href="{{ asset('registration/requirement/npwp/'.$data->foto_npwp) }}"
                            class="mailbox-attachment-name"><i class="fas fa-camera"></i> Foto NPWP
                        </a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span></span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i
                                    class="fas fa-cloud-download-alt"></i></a>
                        </span>
                    </div>
                </li>
                <li>
                    <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>
                    <div class="mailbox-attachment-info">
                        <a href="/download/surat-permohonan/{{ $data->id }}"
                            class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Surat
                            Permohonan</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span></span>
                            <a href="/download/surat-permohonan/{{ $data->id }}"
                                class="btn btn-default btn-sm float-right"><i
                                    class="fas fa-cloud-download-alt"></i></a>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <button type="button" class="btn btn-default" data-toggle="modal"
                data-target="#terima" data-href="/company-registration/terima/{{ $data->id }}"><i class="fas fa-check"></i> Terima</button>
            <button type="button" data-toggle="modal" data-target="#tolak" class="btn btn-default"><i class="fas fa-times"></i>
                Tolak</button>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

    {{-- Modal Terima Permintaan --}}
    <div class="modal fade" id="terima">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </p>
                    <p class="text-center"><b>Terima permintaan ?</b></p>
                    <div style="text-align: right;">
                        <button type="button" class="btn btn-sm btn-success btn-terima" style="border-radius: 100px"><i class="fas fa-check"></i></button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    {{-- Modal Tolak Permintaan --}}
    <div class="modal fade" id="tolak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </p>
                    <form action="/company-registration/tolak/{{ $data->id }}" method="POST">
                        {{ csrf_field() }}
                        <h6>NPWP</h6>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="checkbox" id="check-npwp">
                                </span>
                            </div>
                            <input type="text" name="cek_npwp" class="form-control check-npwp" placeholder="Alasan penolakan" disabled>
                        </div>
                        <br>
                        <h6>Surat Permohonan</h6>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="checkbox" id="check-surat">
                                </span>
                            </div>
                            <input type="text" name="cek_surat" class="form-control check-surat" placeholder="Alasan penolakan" disabled>
                        </div>
                        <br><br>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-sm btn-danger btn-tolak"><i class="fas fa-ban"></i> Tolak Permintaan</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>


