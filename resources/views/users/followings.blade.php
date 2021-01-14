@extends('layouts.app')

@section('content')
    @include('users.card')
    <h3 class="cardtitle text-center"><b>{{ $user->name }}</b></h3>
    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
    <div class="text-center">
        <span class="text-muted">{{ $user->profile }}</span>
    </div>
    {{-- タブ --}}
    @include('users.navtabs')
    <br>
    {{-- ユーザー一覧 --}}
    @include('users.users')
@endsection    