<ul class="nav nav-tabs nav-justified">
    {{-- フォロー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            <span class="badge badge-pill badge-primary">{{ $user->followings_count }}人</span>
            フォロー中
        </a>
    </li>
    {{-- フォロワー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            <span class="badge badge-pill badge-primary">{{ $user->followers_count }}人</span>
            フォロワー
        </a>
    </li>
</ul>
<ul class="nav nav-tabs nav-justified">
    {{-- タイムラインタブ --}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            <span class="badge badge-pill badge-primary">{{ $user->reviews_count }}件</span>
            レビュー
        </a>
    </li>
    {{-- お気に入り一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
            <span class="badge badge-pill badge-primary">{{ $user->favorites_count }}件</span>
            お気に入り
        </a>
    </li>
</ul>