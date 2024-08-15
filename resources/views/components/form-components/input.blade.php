@props(['name', 'label', 'value' => '', 'placeholder' => $label, 'id' => $name])

<label for="{{ $name }}" class="form-label">{{ $label }} </label>
<input type="text" name="{{ $name }}" value="{{ $value }}" {{ $attributes->merge(['class' => 'form-control']) }}
class="" id="{{ $name }}"
placeholder="{{ $placeholder }}">