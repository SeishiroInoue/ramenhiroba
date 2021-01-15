@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><b>登録情報変更</b></h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'profile.update', 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ユーザー名') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('icon', 'アイコン') !!}
                    {!! Form::file('icon', null) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('profile', 'プロフィール') !!}
                    {!! Form::textarea('profile', $user->profile, ['class' => 'form-control', 'rows' => '2']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!} {!! Form::label('password', '※必須',  ['class' => 'alert-danger']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
              
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（再入力）') !!} {!! Form::label('password', '※必須',  ['class' => 'alert-danger']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
    
                {!! Form::submit('変更', ['class' => 'btn btn-danger btn-block mb-3']) !!}
            {!! Form::close() !!}
            
            {{-- パスワード変更ページへのリンク --}}
            <p class="mt-2">パスワードの変更は、{!! link_to_route('password.edit', 'パスワード変更') !!}</p>
        </div>
    </div>    
@endsection('content')    