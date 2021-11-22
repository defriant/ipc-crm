<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">All Companies</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <div class="input-group-append">
                    <span class="input-group-text bg-primary"><i class="fas fa-search" style="color: white"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Cari perusahaan ..." style="border-left: none">
            </div>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div id="all-company-data">
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover">
                    <tbody>
                        @foreach ($company as $c)
                        <tr onclick="return company_view({{$c->id}})" style="cursor: pointer">
                            <td class="mailbox-name" style="color: rgb(0, 165, 0)"><i class="fas fa-building"
                                    style="margin-right: 5px"></i> <b> {{ $c->company_name }} </b></td>
                            <td class="mailbox-subject">
                                <b>Pendaftar |</b>
                                <img src="{{ asset('user/profile_picture/'.$c->user->picture) }}" class="img-circle"
                                    width="25px" height="25px" alt=""
                                    style="position:relative; bottom: 2px; margin-left: 5px; margin-right: 2px">
                                {{ $c->user->first_name }} {{ $c->user->last_name }}
                            </td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date"><b>Bergabung |</b> {{ date('d M Y', strtotime($c->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->

            <div class="card-footer">
                @if ($company->onFirstPage())
                @else
                <button id="company-previous-page" onclick="company_previous_page()"
                    data-href="/all-company?page={{$company->currentPage()-1}}" type="button"
                    class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                @endif

                <input id="company-page-href" type="hidden" value="?page={{$company->currentPage()}}">

                @if ($company->hasMorePages())
                <button id="company-next-page" onclick="company_next_page()"
                    data-href="/all-company?page={{$company->currentPage()+1}}" type="button" class="btn btn-default btn-sm"
                    style="float: right"><i class="fas fa-chevron-right"></i></button>
                @else

                @endif
            </div>
        </div>
    </div>
    <div id="company-loading" class="overlay" style="display: none;"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
</div>
