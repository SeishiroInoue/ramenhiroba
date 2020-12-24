<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-warning">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">ラーメン広場</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li style="font-size:20px; margin:auto">{{ Auth::user()->name }}</li>
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="{{ Auth::user()->icon }}" width="25" height="25"></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()]) !!}</li>
                            {{-- ユーザー情報編集ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('profile.edit', '登録情報変更') !!}</li>
                            {{-- お気に入りへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.favorites', 'お気に入り', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>