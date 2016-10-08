<label {{ $errors->has($field) ? " class=text-danger" : '' }}>{{ $field }}:</label>
<input type="checkbox" name="{{ $field }}" value="1" {{ $value ? 'checked="checked"' : '' }}>
@include('components.errors.help_block', [
    'errors' => $errors,
    'field' => $field,
])
