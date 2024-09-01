@props(['name', 'label', 'value' => '', 'placeholder' => $label, 'id' => $name])

<label for="{{ $name }}">{{ $label }}</label>
<textarea {{ $attributes->merge(['class' => 'form-control']) }}
    name="{{ $name }}"
    id="{{ $id }}"
    rows="3"
    placeholder="{{ $placeholder }}"
>{{ old($name, $value) }}</textarea>