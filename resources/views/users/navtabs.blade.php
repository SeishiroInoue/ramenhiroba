<div class="d-flex flex-row justify-content-center">
    {{-- フォロー一覧タブ --}}
    <div>
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            <span style="color:black"><b>{{ $user->followings_count }}</b></span> <span class="text-muted">フォロー中</span>
        </a>
    </div>
    {{-- フォロワー一覧タブ --}}
    <div>
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            <span class="text-dark"><b>{{ $user->followers_count }}</b></span> <span class="text-muted">フォロワー</span>
        </a>
    </div>
</div>
<ul class="nav nav-tabs nav-justified font-weight-bold"> 
    {{-- タイムラインタブ --}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active shadow-sm' : 'text-muted' }}">
            <span class="badge badge-primary">{{ $user->reviews_count }}件</span> <span>レビュー</span>
        </a>
    </li>
    {{-- お気に入り一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active shadow-sm' : 'text-muted' }}">
            <span class="badge badge-primary">{{ $user->favorites_count }}件</span> <span>お気に入り</span>
        </a>
    </li>
</ul>