@extends('layouts.app')

@section('content')
    @include('users.card')
    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
    <div class="text-center">
        <p>{{ $user->profile }}</p>
    </div>
    {{-- タブ --}}
    @include('users.navtabs')
    {{-- お気に入りー一覧 --}}
    @include('favorites.favorites')
@endsection    