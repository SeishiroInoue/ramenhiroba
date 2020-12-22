{!! Form::open(['route' => 'reviews.store', 'enctype' => 'multipart/form-data', 'action' => 'ReviewsController.php']) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::file('photo', ['class' => 'form-control-file']) !!}
        <select name="score">
        @foreach (config('score') as $key => $score)
            <option value="{{ $key }}" name="score">{{ $score['label'] }}</option>
        @endforeach
        </select>
        {!! Form::submit('レビュー', ['class' => 'btn btn-danger btn-block']) !!} 
    </div>
{!! Form::close() !!}