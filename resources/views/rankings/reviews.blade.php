@extends('layouts.app')

@section('content')
    <h4 class="text-center">
        <i class="fas fa-crown"></i> ランキング <i class="fas fa-crown"></i>
    </h4>
    @include('rankings.navtabs')
    <hr>
    @if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <span class="badge badge-primary">{{ $user->reviews_count }}件</span>
                {{-- ユーザのアイコンを表示 --}}
                <img src="{{ $user->icon }}" width="50" height="50">
                <div class="media-body">
                    <div><b>{{ $user->name }}</b></div>
                    <span class="text-muted">{{ $user->profile }}</span>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', '詳細へ', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
    @endif
@endsection