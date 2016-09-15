<label>{{ $field }}:</label>
<input type="checkbox" name="{{ $field }}" value="1">
@include('components.errors.help_block', [
    'errors' => $errors,
    'field' => $field,
])
