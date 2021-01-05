@extends('layouts.app')

@section('content')
    <h4 class="text-center">
        <i class="fas fa-crown"></i> ランキング <i class="fas fa-crown"></i>
    </h4>
    @include('rankings.navtabs')
    <hr>
    @include('reviews.reviews')
@endsection