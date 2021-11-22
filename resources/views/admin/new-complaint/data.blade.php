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