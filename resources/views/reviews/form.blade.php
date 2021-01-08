{!! Form::open(['route' => 'reviews.store', 'enctype' => 'multipart/form-data', 'action' => 'ReviewsController.php']) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2', 'placeholder' => 'レビュー']) !!}
        {!! Form::text('tags', old('tags'), ['class' => 'form-control', 'placeholder' => '#家系#二郎系']) !!}
        {!! Form::file('photo', ['class' => 'form-control-file']) !!}
        <div class="d-flex flex-row">
            @include('reviews.prefectureForm')
            <div>
                おすすめ度
                <select name="score">
                @foreach (config('score') as $key => $score)
                    <option value="{{ $key }}" name="score">{{ $score['label'] }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <br>
        @include('reviews.mapForm')
        {!! Form::submit('レビュー', ['class' => 'btn btn-danger btn-block']) !!} 
    </div>
{!! Form::close() !!}