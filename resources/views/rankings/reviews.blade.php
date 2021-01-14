@extends('layouts.app')

@section('content')
    <h1 class="text-center">
        ランキング
    </h1>
    @include('rankings.navtabs')
    <hr>
    @include('users.users')
    
@endsection