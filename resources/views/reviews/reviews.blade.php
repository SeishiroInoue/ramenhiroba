@if (count($reviews) > 0)
    <div style="position:relative;z-index:1">
        <ul class="list-unstyled">
            @foreach ($reviews as $review)
            @if ($review->user)
                <li class="media mb-3 col-lg-6 reviews mx-auto">
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
                        <div>
                            {{-- タグ表示 --}}
                            @foreach ($review->tags as $review_tag)
                                <span><a href="{{ route('tag.search', ['tag' => $review_tag->name]) }}" class="badge badge-warning" style="position:relative;z-index:2">{{ $review_tag->name }}</a></span>
                            @endforeach
                        </div>
                        <div style="margin:10px 0;">
                            {{-- 画像表示 --}}
                            <a href="{{ $review->photo }}" data-lightbox="ラーメン">
                            <img src="{{ $review->photo }}" width="320px" height="180"px" style="object-fit:cover;position:relative;z-index:2" alt="{{ $review->user->name }}のラーメン">
                            </a>
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
                                <div class="text-muted" style="margin:3px 0 0 5px;">{{ $review->favorite_users_count }}</div>
                                <div style="margin:0 5px 0 5px;position:relative;z-index:2">
                                        {{-- コメントボタン --}}
                                        {!! Form::open(['route' => ['reviews.show', $review->id], 'method' => 'get']) !!}
                                            {!! Form::submit('コメントする', ['class' => 'btn rounded-pill btn-outline-primary btn-sm']) !!}
                                        {!! Form::close() !!}
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
            @endif    
            @endforeach
        </ul>
        <a href="{{ route('reviews.show', $review->id) }}"
           style="position:absolute;width:100%;height:100%;top:0;left:0;text-indent:100%;white-space:nowrap;overflow:hidden;">
        </a>
    </div>
    {{-- ページネーションのリンク --}}
    <div class="pagination justify-content-center">{{ $reviews->links() }}</div>
@endif