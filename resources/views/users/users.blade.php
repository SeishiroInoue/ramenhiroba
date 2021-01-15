@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media users mb-3 col-md-6 mx-auto" href="{{ route('users.show', $user->id) }}">
                {{-- ユーザのアイコンを表示 --}}
                <img class="mr-2 rounded" src="{{ $user->icon }}" width="50" height="50">
                <div class="media-body">
                    <div><b>{{ $user->name }}</b></div>
                    <div>
                        @if ($user->profile)
                        <span class="text-muted">{{ Str::limit($user->profile, 56, '…') }}</span>
                        @endif
                    </div>    
                    <span class="badge badge-primary">{{ $user->reviews_count }}件</span> <span class="text-muted"><b>レビュー</b></span>
                    
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif


<script>
    $('.media.users').click(function(){
        let href = $(this).attr('href');
        location.href = href;
    });
</script>