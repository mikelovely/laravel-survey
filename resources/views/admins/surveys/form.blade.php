<form action="{{ route('surveys.store') }}" method="POST">
    {{ csrf_field() }}
    @include('components.forms.form_group', [
        'errors' => $errors,
        'field' => 'slug',
        'resource' => $survey->slug,
    ])
    @include('components.forms.form_group', [
        'errors' => $errors,
        'field' => 'title',
        'resource' => $survey->title,
    ])
    @include('components.forms.form_group', [
        'errors' => $errors,
        'field' => 'description',
        'resource' => $survey->description,
    ])
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>