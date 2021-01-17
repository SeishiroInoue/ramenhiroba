@extends('layouts.app')

@section('content')
    @if ($reviews->count())
        <p>"{{ $keyword }}" の検索結果　{{ $count }}件</</p>
        <hr>
    @else
        <p>見つかりませんでした。</p>
    @endif
    @include('reviews.reviews')
@endsection