<label>{{ $field }}:</label>
<input class="form-control datepicker" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $resource }}">
@include('components.errors.help_block', [
    'errors' => $errors,
    'field' => $field,
])
