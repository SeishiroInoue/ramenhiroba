@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="mx-auto">
            {{-- ユーザー表示 --}}
            @include('users.card')
            {{-- 投稿フォーム --}}
            @include('reviews.form')
            {{-- レビュー一覧 --}}
            @include('reviews.reviews')
        </div>
            </div>
        </div> 
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ラーメン広場へようこそ！</h1>
                <p>さっそくレビューしてみよう</p>
                {{-- ユーザ登録ページへのリンク --}}
                 {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
                {{-- ログインページへのリンク --}}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
            </div>
        </div>
        <div>
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
        </div>
    @endif
@endsection