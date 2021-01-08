@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="mx-auto">
            {{-- 投稿フォーム --}}
            @include('reviews.form')
            {{-- レビュー一覧 --}}
            @include('reviews.reviews')
        </div>
    @else
        <div class="center jumbotron" style="background:url(https://ramenhiroba.s3-ap-northeast-1.amazonaws.com/jumbotron-opacity.png) no-repeat top center; background-size:cover">
            <div class="text-center">
                <h1><font face="ヒラギノ"><b>ラーメンを共有しよう</b></font></h1>
                <div>ラーメン広場 は食べたラーメンの写真と感想を</div>
                <div>共有できるサイトです</div>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
                {{-- ログインページへのリンク --}}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
                <div>
                <br>
                <div>ゲストユーザーはこちら</div>    
                {{-- ゲストログインボタン --}}
                {!! link_to_route('login.guest', 'ゲストログイン', [], ['class' => 'btn btn-lg btn-outline-primary', 'type' => 'submit']) !!}
                </div>
            </div>
        </div>
        <div class="mx-auto">
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
        </div>
    @endif
@endsection