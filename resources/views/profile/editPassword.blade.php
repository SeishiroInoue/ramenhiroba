@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><b>パスワード変更</b></h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'password.update', 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('current_password', '現在のパスワード') !!}
                    {!! Form::password('current_password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('new_password', '新しいパスワード') !!}
                    {!! Form::password('new_password', ['class' => 'form-control']) !!}
                </div>
              
                <div class="form-group">
                    {!! Form::label('new_password_confirmation', '新しいパスワード（再入力）') !!}
                    {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                </div>
    
                {!! Form::submit('変更', ['class' => 'btn btn-danger btn-block mb-3']) !!}
            {!! Form::close() !!}
        </div>
    </div>    
@endsection('content')    