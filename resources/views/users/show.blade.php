@extends('layouts.app')

@section('content')
    @include('users.card')
    <h4 class="cardtitle text-center"><b>{{ $user->name }}</b></h4>
    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
    <div class="text-center">
        <span class="text-muted">{{ $user->profile }}</span>
    </div>
    {{-- タブ --}}
    @include('users.navtabs')
        @if (Auth::id() == $user->id)
            {{-- レビューフォーム --}}
             @include('reviews.form')
        @endif
        <br>
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
@endsection    