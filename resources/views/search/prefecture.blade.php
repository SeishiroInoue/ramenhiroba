@extends('layouts.app')

@section('content')
    @if ($reviews->count())
        <p><span class="badge badge-info">{{ $keyword }}</span> のレビュー　{{$reviews->count() }}件</p>
        <hr>
        @include('reviews.reviews')
    @else
        <p>見つかりませんでした。</p>
    @endif    
@endsection