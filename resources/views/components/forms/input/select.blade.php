<label {{ $errors->has($field) ? " class=text-danger" : '' }}>{{ $field }}:</label>
<select class="form-control" name="{{ $field }}">
    @foreach ($data as $item)
        <option {{ $value == $item ? 'selected' : '' }}>{{ $item }}</option>
    @endforeach
</select>
@include('components.errors.help_block', [
    'errors' => $errors,
    'field' => $field,
])