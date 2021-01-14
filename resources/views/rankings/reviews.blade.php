@extends('layouts.app')

@section('content')
    <h1 class="text-center"><b>ランキング</b></h1>
    @include('rankings.navtabs')
    <hr>
    @include('users.users')
    
@endsection