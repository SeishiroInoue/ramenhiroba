@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media users mb-3 col-md-6 mx-auto" href="{{ route('users.show', $user->id) }}">
                {{-- ユーザのアイコンを表示 --}}
                <img src="{{ $user->icon }}" width="50" height="50">
                <div class="media-body">
                    <div><b>{{ $user->name }}</b></div>
                    <span class="text-muted">{{ $user->profile }}</span>
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