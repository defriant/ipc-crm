@foreach ($Complaints as $c)
    <tr class="link" data-href="/complaint/{{ $c->id }}" style="cursor: pointer;">
        @if ($c->status == '0')
        <td><span class="badge badge-danger">New</span></td>
        <td>{{ $c->id }}</td>
        <td>User : {{ $c->user->first_name.' '.$c->user->last_name}}</td>
        <td>{{ $c->perihal }}</td>
        <td>{{ date("d M Y", strtotime($c->created_at)) }}</td>
        <td>Menunggu Tanggapan</td>
        <td>-</td>

        @elseif($c->status == '1')
        <td><span class="badge badge-danger">New</span></td>
        <td>{{ $c->id }}</td>
        <td>User : {{ $c->user->first_name.' '.$c->user->last_name}}</td>
        <td>{{ $c->perihal }}</td>
        <td>{{ date("d M Y", strtotime($c->created_at)) }}</td>
        <td>Follow Up</td>
        <td>{{ $c->admin_nama }}</td>

        @elseif($c->status == '2')
        <td></td>
        <td>{{ $c->id }}</td>
        <td>User : {{ $c->user->first_name.' '.$c->user->last_name}}</td>
        <td>{{ $c->perihal }}</td>
        <td>{{ date("d M Y", strtotime($c->created_at)) }}</td>
        <td>Dibalas</td>
        <td>{{ $c->admin_nama }}</td>

        @elseif($c->status == '3')
        <td><span class="badge badge-danger">New</span></td>
        <td>{{ $c->id }}</td>
        <td>User : {{ $c->user->first_name.' '.$c->user->last_name}}</td>
        <td>{{ $c->perihal }}</td>
        <td>{{ date("d M Y", strtotime($c->created_at)) }}</td>
        <td>Dibalas</td>
        <td>{{ $c->admin_nama }}</td>

        @elseif($c->status == '4')
        <td></td>
        <td>{{ $c->id }}</td>
        <td>User : {{ $c->user->first_name.' '.$c->user->last_name}}</td>
        <td>{{ $c->perihal }}</td>
        <td>{{ date("d M Y", strtotime($c->created_at)) }}</td>
        <td>Selesai</td>
        <td>{{ $c->admin_nama }}</td>
        @endif
    </tr>
@endforeach
