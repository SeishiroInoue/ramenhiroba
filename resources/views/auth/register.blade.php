@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><b>新規登録</b></h1>
        <span class="alert-danger">※全て必須</span>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ユーザー名') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('icon', 'アイコン') !!}
                    {!! Form::file('icon', null) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('profile', 'プロフィール') !!}
                    {!! Form::textarea('profile', old('profile'), ['class' => 'form-control', 'rows' => '2']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（再入力）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('新規登録', ['class' => 'btn btn-danger btn-block mb-3']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
    <script>
        $(function () {
            $('.form-control').on('blur', function () {
                let error;
                let value = $(this).val();
                if (value == "" || !value.match(/[^\s\t]/)) {
                    error = true;
                }
            if (error) {
              alert('入力は必須です。');
            }
            });
        });
    </script>
@endsection