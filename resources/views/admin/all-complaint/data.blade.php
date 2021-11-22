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
