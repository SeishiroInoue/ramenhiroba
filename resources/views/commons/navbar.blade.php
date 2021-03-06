<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-warning fixed-top">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><font face="ＭＳ 明朝"><b>ラーメン広場</b></font> <img src="https://ramenhiroba.s3-ap-northeast-1.amazonaws.com/ramen-icon.png" width="20" height="20" style="color:white"></a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            {{-- 検索フォーム --}}
            <form class="form-inline my-2 my-lg-0 ml-2" action="{{ url('/search') }}">
                <div class="form-group">
                    <input type="search" class="form-control mr-sm-2" name="word"  value="{{ request('word') }}" placeholder="キーワードを入力" aria-label="検索...">
                </div>
                <input type="submit" value="検索" class="btn btn-danger">
            </form>
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- お気に入りランキングへのリンク --}}
                    <li class="nav-item">{!! link_to_route('ranking.favorites', 'ランキング', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link']) !!}</li>
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:black"><span style="margin:auto"><b>{{ Auth::user()->name }} </b></span><img class="rounded" src="{{ Auth::user()->icon }}" style="width:25px;height:25px;object-fit:coover;"></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()], ['class' => 'text-muted list-item']) !!}</li>
                            {{-- お気に入りへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.favorites', 'お気に入り', ['id' => Auth::id()], ['class' => 'text-muted list-item']) !!}</li>
                            {{-- ユーザー情報編集ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('profile.edit', '登録情報変更', [], ['class' => 'text-muted list-item']) !!}</li>
                            {{-- 退会ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('user.delete_confirm', '退会する', [], ['class' => 'text-muted list-item']) !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'text-muted list-item']) !!}</li>
                        </ul>
                    {{-- フォームページへのリンク --}}
                    <li>{!! link_to_route('reviews.form', 'レビューする', [], ['class' => 'btn rounded-pill btn-danger my-sm-1']) !!}</li>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    {{-- フォームページへのリンク --}}
                    <li>{!! link_to_route('reviews.form', 'レビューする', [], ['class' => 'btn rounded-pill btn-danger']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>