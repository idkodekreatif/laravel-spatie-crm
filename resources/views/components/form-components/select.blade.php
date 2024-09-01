@props(['label' => null, 'value' => '', 'id' => 'select_'.rand(), 'placeholder' => $label, 'options' => []])

@if ($label)
<label for="{{ $id }}" class="form-label">{{ $label }}</label>
@endif
<select {{ $attributes->merge(['class' => 'form-control choices-multiple-remove-button']) }} id="{{ $id }}">
    <option value="">{{ $placeholder }}</option>
    @foreach ($options as $key => $item)
    <option value="{{ $item }}" @selected($value==$item)>{{
        $key }}</option>
    @endforeach
</select>