@if (count($tags) > 0)
    <h1 class="text-center"><b>よく使われているタグ</b></h1>
    <hr>
        <ul class-"list-inline list-unstyled">
            @foreach ($tags as $tag)
            <li class="list-inline-item pb-3">
                <a href="{{ route('tag.search', ['tag' => $tag->name]) }}" class="btn btn-warning">{{ $tag->name }}</a></li>
            </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        <div class="col-12 pt-3 ml-2 pagination justify-content-center">{{ $tags->links() }}</div>
@endif