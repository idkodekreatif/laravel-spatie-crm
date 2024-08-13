@props(['name', 'label', 'value' => '', 'placeholder' => $label, 'options' => []])

<label class=" form-label">{{ $label }}</label>
<select {{ $attributes->merge(['class' => 'form-control choices-multiple-remove-button']) }} name="{{
    $name }}">
    <option value="">{{ $placeholder }}</option>
    @foreach ($options as $key => $item)
    <option value="{{ $item }}" @selected($value==$item)>{{
        $key }}</option>
    @endforeach
</select>