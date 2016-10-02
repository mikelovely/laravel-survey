<form action="{{ $url }}" method="POST">
    
    @if ($method == 'patch')
        {{ method_field('PATCH') }}
    @endif
    
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'slug',
            'resource' => $survey->slug,
        ])
    </div>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'title',
            'resource' => $survey->title,
        ])
    </div>
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        @include('components.forms.input.textarea', [
            'errors' => $errors,
            'field' => 'description',
            'resource' => $survey->description,
        ])
    </div>
    <div class="form-group{{ $errors->has('welcome_text') ? ' has-error' : '' }}">
        @include('components.forms.input.textarea', [
            'errors' => $errors,
            'field' => 'welcome_text',
            'resource' => $survey->welcome_text,
        ])
    </div>
    <div class="form-group{{ $errors->has('end_text') ? ' has-error' : '' }}">
        @include('components.forms.input.textarea', [
            'errors' => $errors,
            'field' => 'end_text',
            'resource' => $survey->end_text,
        ])
    </div>
    <div class="form-group{{ $errors->has('end_url') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'end_url',
            'resource' => $survey->end_url,
        ])
    </div>
    <div class="form-group{{ $errors->has('admin_name') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'admin_name',
            'resource' => $survey->admin_name,
        ])
    </div>
    <div class="form-group{{ $errors->has('admin_email') ? ' has-error' : '' }}">
        @include('components.forms.input.regular_text_box', [
            'errors' => $errors,
            'field' => 'admin_email',
            'resource' => $survey->admin_email,
        ])
    </div>
    <div class="form-group{{ $errors->has('allow_registration') ? ' has-error' : '' }}">
        @include('components.forms.input.check_box', [
            'errors' => $errors,
            'field' => 'allow_registration',
            'value' => $survey->allow_registration,
        ])
    </div>
    <div class="form-group{{ $errors->has('anonymized') ? ' has-error' : '' }}">
        @include('components.forms.input.check_box', [
            'errors' => $errors,
            'field' => 'anonymized',
            'value' => $survey->anonymized,
        ])
    </div>
    <div class="form-group{{ $errors->has('starts_at') ? ' has-error' : '' }}">
        @include('components.forms.input.datepicker', [
            'errors' => $errors,
            'field' => 'starts_at',
            'resource' => Carbon\Carbon::parse($survey->starts_at)->format('d-m-Y'),
        ])
    </div>
    <div class="form-group{{ $errors->has('expires_at') ? ' has-error' : '' }}">
        @include('components.forms.input.datepicker', [
            'errors' => $errors,
            'field' => 'expires_at',
            'resource' => Carbon\Carbon::parse($survey->expires_at)->format('d-m-Y'),
        ])
    </div>    

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
</form>