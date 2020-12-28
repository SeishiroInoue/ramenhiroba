@extends('layouts.app')

@section('content')
    <h4 class="text-center">
        <i class="fas fa-crown"></i> お気に入り数ランキング <i class="fas fa-crown"></i>
    </h4>
    <hr>
    @include('reviews.reviews')
@endsection