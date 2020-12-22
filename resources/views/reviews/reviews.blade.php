@if (count($reviews) > 0)
    <ul class="list-unstyled">
        @foreach ($reviews as $review)
            <li class="media mb-3">
                {{-- ユーザのアイコンを表示 --}}
                <img class="mr-2 rounded" src="{{ $user->icon }}" width="50" height="50" alt="{{ $user->name }}">
                <div class="media-body">
                    <div>
                        {{-- レビューの所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $review->user->name, ['user' => $review->user->id]) !!}
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
                        {{-- 画像表示 --}}
                        <img src="{{ $review->photo }}" width="200" height="200" alt="{{ $user->name }}のラーメン">
                    </div>    
                    <div>
                        @if (Auth::id() == $review->user_id)
                            {{-- レビュー削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-info btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $reviews->links() }}
@endif