@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>レビューする</h1>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
        {!! Form::open(['route' => 'reviews.store', 'enctype' => 'multipart/form-data', 'action' => 'ReviewsController.php']) !!}
            <div class="form-group">
                {!! Form::label('contet', 'レビュー') !!}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '7']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('tags', 'タグ') !!}
                {!! Form::text('tags', old('tags'), ['class' => 'form-control', 'placeholder' => '#家系#二郎系']) !!}
            </div>  
            
            <div class="form-group">
                {!! Form::label('photo', '写真') !!}
                {!! Form::file('photo', ['class' => 'form-control-file']) !!}
            </div>
            @include('reviews.prefectureForm')
            <div>
                <label>おすすめ度　　</label>
                <select name="score">
                @foreach (config('score') as $key => $score)
                    <option value="{{ $key }}" name="score">{{ $score['label'] }}</option>
                @endforeach
                </select>
            </div>
            <br>
            @include('reviews.mapForm')
            <div class="text-center">
                {!! Form::submit('レビュー', ['class' => 'btn btn-danger btn-lg mb-3']) !!} 
            </div>
        {!! Form::close() !!}
        </div>
    </div>

@endsection