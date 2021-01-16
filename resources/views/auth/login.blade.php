@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><b>ログイン</b></h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
            
            <br>
            <div class="guest">
                <spna>ゲストユーザーはこちら</span>    
                {{-- ゲストログインボタン --}}
                {!! Form::open(['route' => 'login.guest']) !!}
                        {!! Form::hidden('email', 'guest@guest.jp') !!}
                        {!! Form::hidden('password', 'guestguest') !!}
                        {!! Form::submit('ゲストログイン ', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            </div>
                
            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">{!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
        </div>
    </div>
@endsection