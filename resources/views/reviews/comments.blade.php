@if (count($comments) > 0)
    <div>
        <ul class="list-unstyled">
            @foreach ($comments as $comment)
            @if ($comment->user)
                <li class="media comments mb-3 col-md-6" style="margin:0 auto">
                    {{-- ユーザのアイコンを表示 --}}
                    <a href="{{ route('users.show', $comment->user->id) }}"><img class="mr-2 rounded" src="{{ $comment->user->icon }}" alt="{{ $comment->user->name }}" style="width:50px;height:50px;object-fit:coover;"></a>
                    <div class="media-body">
                        <div>
                            {{-- レビューの所有者のユーザ詳細ページへのリンク --}}
                            <span><b>{!! link_to_route('users.show', $comment->user->name, ['user' => $comment->user->id], ['style' => 'color:black']) !!}</b></span>
                            <span class="text-muted">{{ $comment->created_at }}</span>
                        </div>
                        <div>
                            {{-- コメント内容 --}}
                            <p class="mb-0">{!! nl2br(e($comment->content)) !!}</p>
                        </div>
                        @if ($comment->photo) 
                            <div class="ramen" style="margin:0 0 7px 0">
                                {{-- 画像表示 --}}
                                <a href="{{ $comment->photo }}" data-lightbox="ラーメン">
                                    <img src="{{ $comment->photo }}" class="ramen" alt="{{ $comment->user->name }}のラーメン">
                                </a>
                            </div>
                        @endif
                        @if (Auth::id() == $comment->user_id)
                            <div>
                                {{-- コメント削除ボタン --}}
                                <form action="/comments/delete/{{$comment->id}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="submit" value="削除" class="btn rounded-pill btn-outline-danger btn-sm comment-delete">
                                </form>
                            </div>
                        @endif
                    </div>
                </li>
            @endif    
            @endforeach
        </ul>
    </div>
    {{-- ページネーションのリンク --}}
    <div class="pagination justify-content-center">{{ $comments->links() }}</div>
@else
    <p style="text-align:center">コメントはまだありません。</p>
@endif

<script>

  $(".comment-delete").click(function(){
      if(confirm("本当に削除しますか？")){
      
      }else{
      return false;
      }
  });

</script>