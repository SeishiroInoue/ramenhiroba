@extends('layouts.app')

@section('content')
    @if ($reviews->count())
        <p><span class="badge badge-info">{{ $keyword }}</span> のレビュー　{{ $count }}件</p>
        <hr>
    @else
        <p>見つかりませんでした。</p>
    @endif
    @include('reviews.reviews')
@endsection