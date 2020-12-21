@extends('layouts.app')

@section('content')
    <div class="mx-auto card" style="width: 15rem;">
        <img class="card-img-top" src="{{ $user->icon }}" alt="{{ $user->name }}">
        <div class="card-body">
            <h3 class="card-title text-center">{{ $user->name }}</h3>
        </div>
    </div>
    <div class="text-center">
        <p>{{ $user->profile }}</p>
    </div>
    <ul class="nav nav-tabs nav-justified">
        {{-- フォロー一覧タブ --}}
        <li class="nav-item"><a href="#" class="nav-link">フォロー</a></li>
        {{-- フォロワー一覧タブ --}}
        <li class="nav-item"><a href="#" class="nav-link">フォロワー</a></li>
    </ul>
    <ul class="nav nav-tabs nav-justified">            
        {{--レビュー数タブ --}}
        <li class="nav-item"><a href="#" class="nav-link">レビュー数</a></li>
        {{--タイムラインタブ --}}
        <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>
    </ul>
@endsection    