<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
    <label for="type">{{ $field }}:</label>
    <input class="form-control" name="{{ $field }}" value="{{ old($field) ? old($field) : $resource }}">
    @include('components.errors.help_block', [
        'errors' => $errors,
        'field' => $field,
    ])
</div>