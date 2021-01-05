@if (count($reviews) > 0)
    <div>
        <ul class="list-unstyled">
            @foreach ($reviews as $review)
            @if ($review->user)
                <li class="media mb-3">
                    {{-- ユーザのアイコンを表示 --}}
                    <img class="mr-2 rounded" src="{{ $review->user->icon }}" width="50" height="50" alt="{{ $review->user->name }}">
                    <div class="media-body">
                        <div>
                            {{-- レビューの所有者のユーザ詳細ページへのリンク --}}
                            <span><b>{!! link_to_route('users.show', $review->user->name, ['user' => $review->user->id], ['style' => 'color:black']) !!}</b></span>
                            <span class="text-muted">{{ $review->created_at }}</span>
                        </div>
                           {{-- 星を表示　--}}
                        <div>
                            @switch ($review->score)
                                @case(5) ⭐️⭐️⭐️⭐️⭐️ @break
                                @case(4) ⭐️⭐⭐️⭐️ @break  
                                @case(3) ⭐️⭐️⭐️ @break
                                @case(2) ⭐️️⭐️ @break
                                @case(1) ⭐️️ @break
                            @endswitch    
                        </div>  
                        <div>
                            {{-- レビュー内容 --}}
                            <p class="mb-0">{!! nl2br(e($review->content)) !!}</p>
                        </div>
                        <div>
                            {{-- タグ表示 --}}
                            @foreach ($review->tags as $review_tag)
                                <span><a href="{{ route('tag.search', ['tag_name' => $review_tag->name]) }}" class="badge badge-warning">{{ $review_tag->name }}</a></span>
                            @endforeach
                        </div>
                        <div style="margin:5px 0">
                            {{-- 画像表示 --}}
                            <a href="{{ $review->photo }}" data-lightbox="ラーメン">
                            <img src="{{ $review->photo }}" width="320px" height="180px" style="object-fit:cover" alt="{{ $review->user->name }}のラーメン">
                            </a>
                        </div>
                        @if (Auth::check())
                            <div class="d-flex flex-row">
                                <div>
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
                                <div class="text-muted" style="margin:3px 0 0 5px">{{ $review->favorite_users_count }}</div>
                                <div style="margin:0 5px 0 5px">
                                        {{-- コメントボタン --}}
                                        {!! Form::open(['route' => ['reviews.show', $review->id], 'method' => 'get']) !!}
                                            {!! Form::submit('コメントする', ['class' => 'btn rounded-pill btn-outline-primary btn-sm']) !!}
                                        {!! Form::close() !!}
                                </div>
                                <div class="text-muted" style="margin:3px 5px 0 0">{{ $review->comment_users_count }}</div>
                                @if (Auth::id() == $review->user_id)
                                    <div>
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
    </div>
    {{-- ページネーションのリンク --}}
    <div class="pagination justify-content-center">{{ $reviews->links() }}</div>
@endif