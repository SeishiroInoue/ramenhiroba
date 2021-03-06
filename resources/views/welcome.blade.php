@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <h1 class="text-center"><b>レビュー</b></h1>
        <div class="nav nav-pills justify-content-center">
            {{-- 全てのレビュータブ --}}
            <a href="{{ route('welcome') }}" class="nav-link {{ Request::routeIs('welcome') ? 'active bg-danger font-weight-bold' : 'text-muted' }}">
                <span>全て</span>
            </a>
            {{-- タイムタインタブ --}}
            <a href="{{ route('timeline') }}" class=" nav-link {{ Request::routeIs('timeline') ? 'active bg-danger font-weight-bold' : 'text-muted' }}">
                <span>タイムライン</span>
            </a>
        </div>
        <hr>
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
        <div>
        <br>
        {{-- タグ一覧 --}}
        @include('reviews.tags')
        <br>
        {{-- 日本地図 --}}
        @include('reviews.mapJapan')
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1><b>ラーメンを共有しよう</b></h1>
                <div>ラーメン広場は食べたラーメンの写真と感想を</div>
                <div>共有できるサイトです</div>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
                {{-- ログインページへのリンク --}}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-outline-primary']) !!}
                <div class="guest">
                <br>
                <div>ゲストユーザーはこちら</div>    
                    {{-- ゲストログインボタン --}}
                    {!! Form::open(['route' => 'login.guest']) !!}
                        {!! Form::submit('ゲストログイン ', ['class' => 'btn btn-outline-primary btn-lg mb-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
        <br>
        {{-- タグ一覧 --}}
        @include('reviews.tags')
        <br>
        {{-- タグ一覧 --}}
        @include('reviews.mapJapan')
    @endif
    
@endsection