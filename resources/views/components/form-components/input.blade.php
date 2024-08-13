@props(['name', 'label', 'value' => ''])

<label for="name" class="form-label">{{ $label }} </label>
<input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control" id="name" placeholder="Nama Menu">