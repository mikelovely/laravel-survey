<label>{{ $field }}:</label>
<textarea class="form-control" rows="5" name="{{ $field }}">{{ old($field) ? old($field) : $resource }}</textarea>
@include('components.errors.help_block', [
    'errors' => $errors,
    'field' => $field,
])
