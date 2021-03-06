@if (count($reviews) > 0)
    <div>
        <ul class="list-unstyled">
            @foreach ($reviews as $review)
                <li class="media reviews col-md-6 content-justify-center" style="position:relative;z-index:1">
                    {{-- ユーザのアイコンを表示 --}}
                    <a href="{{ route('users.show', $review->user->id) }}"><img class="mr-2 rounded" src="{{ $review->user->icon }}" alt="{{ $review->user->name }}" style="position:relative;z-index:2;width:50px;height:50px;object-fit:coover;"></a>
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
                        <div class="content" style="position:relative;z-index:2">
                            {{-- レビュー内容 --}}
                            <p class="mb-0">{!! nl2br(e($review->content)) !!}</p>
                        </div>
                        <div>
                            {{-- タグ表示 --}}
                            @if ($review->tags)
                                @foreach ($review->tags as $review_tag)
                                    <span><a href="{{ route('tag.search', ['tag' => $review_tag->name]) }}" class="badge badge-warning" style="position:relative;z-index:2">{{ $review_tag->name }}</a></span>
                                @endforeach
                            @endif    
                                <span style="color:#fff3cd;">hidden</span>
                        </div>
                        <div class="ramen" style="margin:7px 0;">
                            {{-- 画像表示 --}}
                            <a href="{{ $review->photo }}" data-lightbox="ラーメン">
                            <img src="{{ $review->photo }}" class="ramen" style="position:relative;z-index:2" alt="{{ $review->user->name }}のラーメン">
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
                                    <a class="btn rounded-pill btn-outline-primary btn-sm" href='/reviews/{{ $review->id }}/#comment'>コメント</a>
                                </div>
                                <div class="text-muted" style="margin:3px 5px 0 0">{{ $review->comment_users_count }}</div>
                                @if (Auth::id() == $review->user_id)
                                    <div style="position:relative;z-index:2">
                                        {{-- レビュー削除ボタン --}}
                                        <form action="/reviews/delete/{{$review->id}}" method="POST">
                                            @csrf
                                            <input type="submit" value="削除" class="btn rounded-pill btn-outline-danger btn-sm review-delete">
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('reviews.show', $review->id) }}"
                       style="position:absolute;width:100%;height:100%;top:0;left:0;text-indent:100%;white-space:nowrap;overflow:hidden;">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    {{-- ページネーションのリンク --}}
    <div class="col-12 pt-3 ml-2 pagination justify-content-center">{{ $reviews->appends(request()->query())->links() }}</div>
    @if(Session::has('flashmessage'))
        <!-- モーダルウィンドウの中身 -->
        <div class="modal fade" id="myModal" tabindex="-1"
             role="dialog" aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        {{ session('flashmessage') }}
                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/jquery.collapser.js"></script>
<script>

  $('.content').collapser({
      mode: 'chars',
      truncate: 0,
      showText: 'レビューを読む',
      hideText: ' 戻す'
  });
  
  $(".review-delete").click(function(){
      if(confirm("本当に削除しますか？")){
      
      }else{
      return false;
      }
  });
  
  $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>