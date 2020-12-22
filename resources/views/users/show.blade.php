@extends('layouts.app')

@section('content')
    @include('users.card')
    <div class="text-center">
        <p>{{ $user->profile }}</p>
    </div>
    <ul class="nav nav-tabs nav-justified">
        {{-- フォロー一覧タブ --}}
        <li class="nav-item"><a href="#" class="nav-link">フォロー</a></li>
        {{-- フォロワー一覧タブ --}}
        <li class="nav-item"><a href="#" class="nav-link">フォロワー</a></li>
    </ul>
    <ul class="nav nav-tabs nav-justified">            
        {{--レビュー数タブ --}}
        <li class="nav-item"><a href="#" class="nav-link">レビュー数</a></li>
        {{--タイムラインタブ --}}
        <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>
    </ul>
        @if (Auth::id() == $user->id)
            {{-- レビューフォーム --}}
             @include('reviews.form')
        @endif
        {{-- 投稿一覧 --}}
        @include('reviews.reviews')
@endsection    