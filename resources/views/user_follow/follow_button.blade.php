@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        {{-- アンフォローボタンのフォーム --}}
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('フォロー中', ['class' => "btn btn-primary btn-block mx-auto", 'style'=> "width: 15rem;"]) !!}
        {!! Form::close() !!}
    @else
        {{-- フォローボタンのフォーム --}}
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('フォローする', ['class' => "btn btn-outline-primary btn-block mx-auto", 'style'=> "width: 15rem;"]) !!}
        {!! Form::close() !!}
    @endif
@endif