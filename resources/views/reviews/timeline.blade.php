@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1 class="text-center"><b>レビュー</b></h1>
        <div class="nav nav-pills justify-content-center">
            {{-- 全てのレビュータブ --}}
            <a href="{{ route('welcome') }}" class="nav-link {{ Request::routeIs('welcome') ? 'active bg-danger font-weight-bold' : 'text-muted' }}">
                <span>全て</span>
            </a>
            {{-- フォロー中のユーザーのレビュータブ --}}
            <a href="{{ route('timeline') }}" class=" nav-link {{ Request::routeIs('timeline') ? 'active bg-danger font-weight-bold' : 'text-muted' }}">
                <span>タイムライン</span>
            </a>
        </div>
        <hr>
        {{-- レビュー一覧 --}}
        @include('reviews.reviews')
    @endif
    
@endsection    