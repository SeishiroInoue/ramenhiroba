@extends('layouts.app')

    @section('content')
        {{-- 画像表示 --}}
        <div style="text-align:center;">
            <img src="{{ $review->photo }}" class="ramen photo" alt="{{ $review->user->name }}のラーメン" style="box-shadow: 0 5px 10px 0 rgba(0,0,0,0.3);">
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
                            <span><b>{!! link_to_route('users.show', $review->user->name, ['user' => $review->user->id], ['style' => 'color:black']) !!}</b></span>
                            <span class="text-muted">{{ $review->created_at }}</span>
                        </div>
                        <div class="d-flex flex-row">
                            {{-- 都道府県を表示 --}}
                            @include('reviews.prefecture')
                            {{-- 星を表示　--}}
                            <div style="margin:0 5px"> 
                                @switch ($review->score)
                                    @case(5) <span><a href="{{ route('score.search', ['score' => '5']) }}">⭐️⭐️⭐️⭐️⭐</a></span>@break
                                    @case(4) <span><a href="{{ route('score.search', ['score' => '4']) }}">⭐️⭐️⭐️⭐️</a></span>@break  
                                    @case(3) <span><a href="{{ route('score.search', ['score' => '3']) }}">⭐️⭐️⭐️</a></span>@break
                                    @case(2) <span><a href="{{ route('score.search', ['score' => '2']) }}">⭐️⭐️</a></span>@break
                                    @case(1) <span><a href="{{ route('score.search', ['score' => '1']) }}">⭐️</a></span>@break
                                @endswitch    
                            </div>
                        </div>
                        <div class="content-show">
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
                        @if (Auth::check())
                            <div class="d-flex flex-row" style="margin:7px 0;">
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
                                <div class="text-muted" style="margin:3px 5px 0 0">{{ $review->comment_users_count }}</div>
                                @if (Auth::id() == $review->user_id)
                                    <div>
                                        {{-- レビュー削除ボタン --}}
                                        <form action="/reviews/show/delete/{{$review->id}}" method="POST">
                                            @csrf
                                            <input type="submit" value="削除" class="btn rounded-pill btn-outline-danger btn-sm review-show-delete">
                                        </form>
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
        <div class="col-md-6 offset-md-3" id="comment">
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
            <p><b>同じ店舗の他のレビュー</b></p>
            <hr>
            @include('reviews.sameReviews')  
        @endif
        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/jquery.collapser.js"></script>

<script>

  $('.content-show').collapser({
      mode: 'lines',
      truncate: 15,
      showText: 'レビューを読む',
      hideText: ' 戻す'
  });
  
  $(".review-show-delete").click(function(){
      if(confirm("本当に削除しますか？")){
    　
      }else{
      return false;
      }
  });
  
  $(function(){
    url = window.location.toString();
	anc = url.substring(url.search('#') + 1);
	
    if(anc){
        var Hash = $("#"+anc);
        var HashOffset = $(Hash).offset().top;
        jQuery("html,body").animate({
            scrollTop: HashOffset
        }, 500);
    }
});
    
</script>
@endsection