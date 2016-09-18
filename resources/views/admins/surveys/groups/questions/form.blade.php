<form action="{{ $url }}" method="POST">

    @if ($method == 'patch')
        {{ method_field('PATCH') }}
    @endif
    
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'title',
            'resource' => $question->title,
        ])
    </div>
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        @include('components.forms.input.textarea', [
            'errors' => $errors,
            'field' => 'description',
            'resource' => $question->description,
        ])
    </div>
    <div class="form-group{{ $errors->has('mandatory') ? ' has-error' : '' }}">
        @include('components.forms.input.check_box', [
            'errors' => $errors,
            'field' => 'mandatory',
            'value' => $question->mandatory,
        ])
    </div>
    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        @include('components.forms.input.select', [
            'errors' => $errors,
            'field' => 'type',
            'data' => App\Models\Question::$question_types,
            'value' => $question->type,
        ])
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
</form>