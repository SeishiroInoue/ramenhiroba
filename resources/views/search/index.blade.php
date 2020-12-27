@extends('layouts.app')

@section('content')
    @if ($reviews->count())
        <p>{{ $keyword }}の検索結果</p>
        @include('reviews.reviews')
    @else
        <p>見つかりませんでした。</p>
    @endif    
@endsection