@props(['name', 'value' => '', 'label', 'id' => $name, 'checked' => false])
<div class="form-check form-check-inline">
    <input class="form-check-input {{ $checked }}" name="permissions[]" type="checkbox" id="inlineCheckbox1{{ $id }}"
        value="{{ $value }}">
    <label class="form-check-label" for="inlineCheckbox1{{ $id }}">{{ $label }}</label>
</div>