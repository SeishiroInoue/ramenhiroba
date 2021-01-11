@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="mx-auto">
            {{-- レビュー一覧 --}}
            @include('reviews.reviews')
        </div>
    @else
        <div class="center jumbotron">
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
                {!! Form::open(['route' => 'login.guest']) !!}
                    {!! Form::hidden('email', 'guest@guest.jp') !!}
                    {!! Form::hidden('password', 'guestguest') !!}
                    {!! Form::submit('ゲストログイン ', ['class' => 'btn btn-outline-primary btn-lg mb-3']) !!}
                {!! Form::close() !!}    
                </div>
            </div>
        </div>
        <div class="mx-auto">
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
        </div>
    @endif
@endsection