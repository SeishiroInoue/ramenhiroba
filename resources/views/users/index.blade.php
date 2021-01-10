@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ユーザー</h1>
        <hr>
    </div>
    {{-- ユーザ一覧 --}}
    @include('users.users')
@endsection