<form action="{{ $url }}" method="POST">
    
    @if ($method == 'patch')
        {{ method_field('PATCH') }}
    @endif
    
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'slug',
            'resource' => $group->slug,
        ])
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'title',
            'resource' => $group->title,
        ])
    </div>
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        @include('components.forms.input.textarea', [
            'errors' => $errors,
            'field' => 'description',
            'resource' => $group->description,
        ])
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
</form>