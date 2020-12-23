@extends('layouts.app')

@section('content')
    @include('users.card')
    {{-- フォロー／アンフォローボタン --}}
    <h3 class="cardtitle text-center">{{ $user->name }}</h3>
    @include('user_follow.follow_button')
    <div class="text-center">
        <p>{{ $user->profile }}</p>
    </div>
    {{-- タブ --}}
    @include('users.navtabs')
        @if (Auth::id() == $user->id)
            {{-- レビューフォーム --}}
             @include('reviews.form')
        @endif
        {{-- 投稿一覧 --}}
        @include('reviews.reviews')
@endsection    