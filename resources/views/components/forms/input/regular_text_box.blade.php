<label {{ $errors->has($field) ? " class=text-danger" : '' }}>{{ $field }}:</label>
<input class="form-control" name="{{ $field }}" value="{{ old($field) ? old($field) : $resource }}">
@include('components.errors.help_block', [
    'errors' => $errors,
    'field' => $field,
])
