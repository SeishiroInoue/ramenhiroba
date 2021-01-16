@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><b>ユーザー退会</b></h1> 
    </div>    
        @if (Auth::id() == 1)
        <div class="text-center mb-3">
            <span class="alert-danger">※ゲストユーザーは、退会できません。</span>
        </div>    
        @endif
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            @if (Auth::id() == 1)
                <div>
                    {!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()], ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            @else
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
            @endif
        </div>
    </div>
@endsection('content')