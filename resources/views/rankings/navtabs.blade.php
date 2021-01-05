<div class="nav nav-pills justify-content-center">
    {{-- お気に入り数ランキングタブ --}}
    <a href="{{ route('ranking.favorites') }}" class="nav-link {{ Request::routeIs('ranking.favorites') ? 'active bg-danger font-weight-bold' : 'text-muted' }}">
        <span>レビューお気に入り数</span>
    </a>
    {{-- コメント数ランキングタブ --}}
    <a href="{{ route('ranking.comments') }}" class=" nav-link {{ Request::routeIs('ranking.comments') ? 'active bg-danger font-weight-bold' : 'text-muted' }}">
        <span>レビューコメント数</span>
    </a>
    {{-- レビュー数ランキングタブ --}}
    <a href="{{ route('ranking.reviews') }}" class="nav-link {{ Request::routeIs('ranking.reviews') ? 'active bg-danger font-weight-bold' : 'text-muted' }}">
        <span>ユーザーレビュー数</span>
    </a>
</div>