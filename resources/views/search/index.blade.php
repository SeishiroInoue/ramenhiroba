@extends('layouts.app')

@section('content')
    @if ($reviews->count())
        @include('reviews.reviews')
    @else
        <p>見つかりませんでした。</p>
    @endif    
@endsection