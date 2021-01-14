@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><b>ユーザー退会</b></h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="panel-body">
                <p>退会すると、ログインができなくなり、投稿したレビューも全て削除されます。</p>
                <p>本当に退会してよろしいですか？</p>
            </div>
            <div>
                {!! Form::open(['route' => ['users.destroy', 'user' => Auth::id()], 'method' => 'delete']) !!}
                    {!! Form::submit('退会する', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            </div>
            <br>
            <div>
                {!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()], ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    </div>
@endsection('content')