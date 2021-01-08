@extends('layouts.app')

@section('content')
    @if ($reviews->count())
        @switch($keyword)
            @case(5) <p>おすすめ度⭐️⭐️⭐️⭐⭐️　のレビュー　{{$reviews->count() }}件</p>@break
            @case(4) <p>おすすめ度⭐️⭐️⭐️⭐　のレビュー　{{$reviews->count() }}件</p>@break
            @case(3) <p>おすすめ度⭐️⭐️⭐　のレビュー　{{$reviews->count() }}件</p>@break
            @case(2) <p>おすすめ度⭐️⭐　のレビュー　{{$reviews->count() }}件</p>@break
            @case(1) <p>おすすめ度⭐　のレビュー　{{$reviews->count() }}件</p>@break
        @endswitch    
        <hr>
        @include('reviews.reviews')
    @else
        <p>見つかりませんでした。</p>
    @endif    
@endsection