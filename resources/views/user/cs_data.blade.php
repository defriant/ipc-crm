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