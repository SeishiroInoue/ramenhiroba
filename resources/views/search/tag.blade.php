@extends('layouts.app')

@section('content')
    @if ($reviews->count())
        <p><span class="badge badge-warning">{{ $keyword }}</span> が付いたレビュー　{{ $count }}件</</p>
        <hr>
    @else
        <p>見つかりませんでした。</p>
    @endif
    @include('reviews.reviews')
@endsection