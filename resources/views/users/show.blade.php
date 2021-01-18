@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img class="profile-image rounded" src="{{ $user->icon }}" alt="{{ $user->name }}">
        <h3 class="cardtitle"><b>{{ $user->name }}</b></h3>
    </div>
    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
    <div class="text-center">
        <span class="text-muted">{{ $user->profile }}</span>
    </div>
    {{-- タブ --}}
    @include('users.navtabs')
        <br>
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
@endsection    