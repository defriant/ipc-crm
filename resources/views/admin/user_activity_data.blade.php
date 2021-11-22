<ul class="users-list clearfix">
    @foreach ($user_data as $d)
    <li>
        @if ($d->picture == null)
            <img src="{{ asset('user/profile_picture/no-avatar.png') }}" width="100px" alt="User Image">
        @else
            <img src="{{ asset('user/profile_picture/'.$d->picture) }}" width="100px" alt="User Image">
        @endif
        <a class="users-list-name" href="#">{{ $d->first_name.' '.$d->last_name }}</a>
        @if ($d->isOnline())
            <span class="users-list-date" style="color: #8bc34a"><i class="fas fa-circle" style="font-size: 5px; position: relative; right: 5px; bottom: 2px;"></i>Online</span>
        @else
            <span class="users-list-date"><i class="fas fa-circle" style="font-size: 5px; position: relative; right: 5px; bottom: 2px;"></i>Offline</span>
        @endif
    </li>
    @endforeach
</ul>

<div class="card-footer">
    @if ($user_data->onFirstPage())
    @else
        <button id="user-previous-page" onclick="user_previous_page()" data-href="/user-activity?page={{$user_data->currentPage()-1}}" type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
    @endif

    <input id="user-page-href" type="hidden" value="?page={{$user_data->currentPage()}}">

    @if ($user_data->hasMorePages())
        <button id="user-next-page" onclick="user_next_page()" data-href="/user-activity?page={{$user_data->currentPage()+1}}" type="button" class="btn btn-default btn-sm" style="float: right"><i class="fas fa-chevron-right"></i></button>
    @else
    
    @endif
</div>

