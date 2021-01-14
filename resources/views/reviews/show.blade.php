@extends('layouts.app')

    @section('content')
        {{-- 画像表示 --}}
        <div style="text-align:center">
            <img src="{{ $review->photo }}" class="ramen photo col-md-6" alt="{{ $review->user->name }}のラーメン">
        </div>
        <br>
        <div class="container">
            <div class="row">
                <li class="media review mb-3 col-md-6 mx-auto">
                    {{-- ユーザのアイコンを表示 --}}
                    <a href="{{ route('users.show', $review->user->id) }}"><img class="mr-2 rounded" src="{{ $review->user->icon }}" width="50" height="50" alt="{{ $review->user->name }}" style="position:relative;z-index:2"></a>
                    <div class="media-body">
                        <div>
                            {{-- レビューの所有者のユーザ詳細ページへのリンク --}}
                            <span style="position:relative;z-index:2"><b>{!! link_to_route('users.show', $review->user->name, ['user' => $review->user->id], ['style' => 'color:black']) !!}</b></span>
                            <span class="text-muted">{{ $review->created_at }}</span>
                        </div>
                        <div class="d-flex flex-row">
                            {{-- 都道府県を表示 --}}
                            @include('reviews.prefecture')
                            {{-- 星を表示　--}}
                            <div style="margin:0 5px;position:relative;z-index:2"> 
                                @switch ($review->score)
                                    @case(5) <span><a href="{{ route('score.search', ['score' => '5']) }}">⭐️⭐️⭐️⭐️⭐</a></span>@break
                                    @case(4) <span><a href="{{ route('score.search', ['score' => '4']) }}">⭐️⭐️⭐️⭐️</a></span>@break  
                                    @case(3) <span><a href="{{ route('score.search', ['score' => '3']) }}">⭐️⭐️⭐️</a></span>@break
                                    @case(2) <span><a href="{{ route('score.search', ['score' => '2']) }}">⭐️⭐️</a></span>@break
                                    @case(1) <span><a href="{{ route('score.search', ['score' => '1']) }}">⭐️</a></span>@break
                                @endswitch    
                            </div>
                        </div>
                        <div>
                            {{-- レビュー内容 --}}
                            <p class="mb-0">{!! nl2br(e($review->content)) !!}</p>
                        </div>
                        <div style="margin:0 0 7px 0">
                            {{-- タグ表示 --}}
                            @foreach ($review->tags as $review_tag)
                                <span><a href="{{ route('tag.search', ['tag' => $review_tag->name]) }}" class="badge badge-warning">{{ $review_tag->name }}</a></span>
                            @endforeach
                        </div>
                        @if (Auth::check())
                            <div class="d-flex flex-row">
                                <div style="position:relative;z-index:2">
                                    @if (Auth::user()->is_favoriting($review->id))
                                        {{-- 非お気に入りボタン --}}
                                        {!! Form::open(['route' => ['favorites.unfavorite', $review->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('お気に入り', ['class' => "btn rounded-pill btn-success btn-sm"]) !!}
                                        {!! Form::close() !!}
                                    @else
                                        {{-- お気に入りのボタン --}}
                                        {!! Form::open(['route' => ['favorites.favorite', $review->id]]) !!}
                                            {!! Form::submit('お気に入り', ['class' => "btn rounded-pill btn-outline-success btn-sm"]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                                <div class="text-muted" style="margin:3px 5px 0 0">{{ $review->comment_users_count }}</div>
                                @if (Auth::id() == $review->user_id)
                                    <div style="position:relative;z-index:2">
                                        {{-- レビュー削除ボタン --}}
                                        {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('削除', ['class' => 'btn rounded-pill btn-outline-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                @endif   
                            </div>
                        @endif
                    </div>
                </li>
                <div class="map mb-3 col-md-6 mx-auto">
                    {{-- 地図表示 --}}
                    @include('reviews.map')
                </div>
            </div>
        </div>
        <div class="col-md-6 offset-md-3">
            {!! Form::open(['route' => 'comments.store', 'enctype' => 'multipart/form-data', 'action' => 'CommentsController.php']) !!}
            <div class="form-group">
                {!! Form::hidden('review_id',$review->id) !!}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows'  => '5']) !!}
                {!! Form::file('photo', ['class' => 'form-control-file mb-3']) !!}
                <div class="text-center">
                    {!! Form::submit('コメント', ['class' => 'btn btn-primary btn-lg']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        {{-- コメント表示 --}}
        @include('reviews.comments')  
        {{-- 同じ店舗のレビュー表示 --}}
        @if (count($same_reviews) > 0)
            <p><b>同じ店舗のレビュー</b></p>
            <hr>
            @include('reviews.sameReviews')  
        @endif
        
@endsection