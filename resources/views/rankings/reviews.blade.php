@extends('layouts.app')

@section('content')
    <h1 class="text-center">
        <i class="fas fa-crown"></i> ランキング <i class="fas fa-crown"></i>
    </h1>
    @include('rankings.navtabs')
    <hr>
    @include('users.users')
    
@endsection