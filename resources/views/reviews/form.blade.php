@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1><b>レビューする</b></h1>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
        {!! Form::open(['route' => 'reviews.store', 'enctype' => 'multipart/form-data', 'action' => 'ReviewsController.php']) !!}
            <div class="form-group">
                {!! Form::label('contet', 'レビュー') !!}<span class="alert-danger">※必須</span>
                {!! Form::textarea('content', old('content'), ['class' => 'form-control form-review', 'rows' => '7']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('tags', 'タグ') !!}{!! Form::label('tags', '※任意',  ['class' => 'text-muted']) !!}
                {!! Form::text('tags', old('tags'), ['class' => 'form-control', 'placeholder' => '#家系#二郎系']) !!}
            </div>  
            
            <div class="form-group">
                {!! Form::label('photo', '写真') !!}<span class="alert-danger">※必須</span>
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
    <script>
        $(function () {
            $('.form-review').on('blur', function () {
                let error;
                let value = $(this).val();
                if (value == "" || !value.match(/[^\s\t]/)) {
                    error = true;
                }
            if (error) {
              alert('入力は必須です。');
            }
            });
        });
    </script>
@endsection