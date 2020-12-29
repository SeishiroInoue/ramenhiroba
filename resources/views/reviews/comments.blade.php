@if (count($comments) > 0)
    <div>
        <ul class="list-unstyled">
            @foreach ($comments as $comment)
            @if ($comment->user)
                <li class="media mb-3">
                    {{-- ユーザのアイコンを表示 --}}
                    <img class="mr-2 rounded" src="{{ $comment->user->icon }}" width="50" height="50" alt="{{ $comment->user->name }}">
                    <div class="media-body">
                        <div>
                            {{-- レビューの所有者のユーザ詳細ページへのリンク --}}
                            {!! link_to_route('users.show', $comment->user->name, ['user' => $comment->user->id]) !!}
                            <span class="text-muted">{{ $comment->created_at }}</span>
                        </div>
                        <div>
                            {{-- コメント内容 --}}
                            <p class="mb-0">{!! nl2br(e($comment->content)) !!}</p>
                        </div>
                        <div style="margin:0 0 7px 0">
                            {{-- 画像表示 --}}
                            <a href="{{ $comment->photo }}" data-lightbox="ラーメン">
                            <img src="{{ $comment->photo }}" width="320px" height="180px" style="object-fit:cover" alt="{{ $comment->user->name }}のラーメン">
                            </a>
                        </div>
                        <div>
                            @if (Auth::id() == $comment->user_id)
                                {{-- コメント削除ボタン --}}
                                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除', ['class' => 'btn rounded-pill btn-outline-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                        </div>
                    </div>
                </li>
            @endif    
            @endforeach
        </ul>
    </div>
    {{-- ページネーションのリンク --}}
    <div class="pagination justify-content-center">{{ $comments->links() }}</div>
@else
    <p>コメントはまだありません。</p>
@endif