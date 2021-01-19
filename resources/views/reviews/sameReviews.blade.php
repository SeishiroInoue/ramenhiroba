@if (count($same_reviews) > 0)
    <div>
        <ul class="list-unstyled">
            @foreach ($same_reviews as $same_review)
                <li class="media reviews col-md-6 content-justify-center" style="position:relative;z-index:1">
                    {{-- ユーザのアイコンを表示 --}}
                    <a href="{{ route('users.show', $same_review->user->id) }}"><img class="mr-2 rounded" src="{{ $same_review->user->icon }}" width="50" height="50" alt="{{ $same_review->user->name }}" style="position:relative;z-index:2"></a>
                    <div class="media-body">
                        <div>
                            {{-- レビューの所有者のユーザ詳細ページへのリンク --}}
                            <span style="position:relative;z-index:2"><b>{!! link_to_route('users.show', $same_review->user->name, ['user' => $same_review->user->id], ['style' => 'color:black']) !!}</b></span>
                            <span class="text-muted">{{ $same_review->created_at }}</span>
                        </div>
                        <div class="d-flex flex-row">
                            {{-- 都道府県を表示 --}}
                            @include('reviews.prefecture')
                            {{-- 星を表示　--}}
                            <div style="margin:0 5px;position:relative;z-index:2"> 
                                @switch ($same_review->score)
                                    @case(5) <span><a href="{{ route('score.search', ['score' => '5']) }}">⭐️⭐️⭐️⭐️⭐</a></span>@break
                                    @case(4) <span><a href="{{ route('score.search', ['score' => '4']) }}">⭐️⭐️⭐️⭐️</a></span>@break  
                                    @case(3) <span><a href="{{ route('score.search', ['score' => '3']) }}">⭐️⭐️⭐️</a></span>@break
                                    @case(2) <span><a href="{{ route('score.search', ['score' => '2']) }}">⭐️⭐️</a></span>@break
                                    @case(1) <span><a href="{{ route('score.search', ['score' => '1']) }}">⭐️</a></span>@break
                                @endswitch    
                            </div>
                        </div>
                        <div class="content" style="position:relative;z-index:2">
                            {{-- レビュー内容 --}}
                            <p class="mb-0">{!! nl2br(e($same_review->content)) !!}</p>
                        </div>
                        <div>
                            {{-- タグ表示 --}}
                            @if ($same_review->tags)
                                @foreach ($same_review->tags as $same_review_tag)
                                    <span><a href="{{ route('tag.search', ['tag' => $same_review_tag->name]) }}" class="badge badge-warning" style="position:relative;z-index:2">{{ $same_review_tag->name }}</a></span>
                                @endforeach
                            @endif    
                                <span style="color:#fff3cd;">hidden</span>
                        </div>
                        <div class="ramen" style="margin:7px 0;">
                            {{-- 画像表示 --}}
                            <a href="{{ $same_review->photo }}" data-lightbox="ラーメン">
                            <img src="{{ $same_review->photo }}" class="ramen" style="position:relative;z-index:2" alt="{{ $same_review->user->name }}のラーメン">
                            </a>
                        </div>
                        @if (Auth::check())
                            <div class="d-flex flex-row">
                                <div style="position:relative;z-index:2">
                                    @if (Auth::user()->is_favoriting($same_review->id))
                                        {{-- 非お気に入りボタン --}}
                                        {!! Form::open(['route' => ['favorites.unfavorite', $same_review->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('お気に入り', ['class' => "btn rounded-pill btn-success btn-sm"]) !!}
                                        {!! Form::close() !!}
                                    @else
                                        {{-- お気に入りのボタン --}}
                                        {!! Form::open(['route' => ['favorites.favorite', $same_review->id]]) !!}
                                            {!! Form::submit('お気に入り', ['class' => "btn rounded-pill btn-outline-success btn-sm"]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                                <div class="text-muted" style="margin:3px 0 0 5px;">{{ $same_review->favorite_users_count }}</div>
                                <div style="margin:0 5px 0 5px;position:relative;z-index:2">
                                    {{-- コメントボタン --}}
                                    <a class="btn rounded-pill btn-outline-primary btn-sm" href='/reviews/{{ $same_review->id }}/#comment'>コメント</a>
                                </div>
                                <div class="text-muted" style="margin:3px 5px 0 0">{{ $same_review->comment_users_count }}</div>
                                @if (Auth::id() == $same_review->user_id)
                                    <div style="position:relative;z-index:2">
                                        {{-- レビュー削除ボタン --}}
                                        <form action="/reviews/delete/{{$same_review->id}}" method="POST">
                                            @csrf
                                            <input type="submit" value="削除" class="btn rounded-pill btn-outline-danger btn-sm same-review-delete">
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('reviews.show', $same_review->id) }}"
                       style="position:absolute;width:100%;height:100%;top:0;left:0;text-indent:100%;white-space:nowrap;overflow:hidden;">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    {{-- ページネーションのリンク --}}
    <div class="col-12 pt-3 ml-2 pagination justify-content-center">{{ $same_reviews->links() }}</div>
@endif

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/jquery.collapser.js"></script>
<script>

  $('.content').collapser({
    mode: 'chars',
    truncate: 0,
    showText: 'レビューを読む',
    hideText: ' 戻す'
  });
  
  $(".same-review-delete").click(function(){
      if(confirm("本当に削除しますか？")){
    　
      }else{
      return false;
      }
  });

</script>