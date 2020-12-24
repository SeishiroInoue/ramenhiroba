@extends('layouts.app')

@section('content')
    @include('users.card')
    <h4 class="cardtitle text-center">{{ $user->name }}</h4>
    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
    <div class="text-center">
        <p>{{ $user->profile }}</p>
    </div>
    {{-- タブ --}}
    @include('users.navtabs')
    {{-- ユーザー一覧 --}}
    @include('users.users')
@endsection    