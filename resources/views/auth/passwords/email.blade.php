@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><b>パスワードリセットメール送信</b></h1>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ffset-md-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            {!! Form::open(['route' => 'password.email']) !!}
                <div class="form-group">
                    <label>メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                {!! Form::submit('パスワードリセットリンクを送る', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
</div>
@endsection