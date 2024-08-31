@props(['name', 'value' => '', 'label', 'justify' => 'form-check-inline', 'id' => $name, 'checked' => false])
<div class="form-check {{ $justify }}">
    <input {{ $attributes->merge(['class' => "form-check-input" ]) }} {{ $checked }} name="{{ $name }}"
    type="checkbox" id="inlineCheckbox1{{ $id }}"
    value="{{ $value }}">
    <label class="form-check-label" for="inlineCheckbox1{{ $id }}">{{ $label }}</label>
</div>