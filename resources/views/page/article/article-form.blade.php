<x-form-components.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="form-group">
            <x-form-components.input name="title" value="{{ $data->title }}" label="Title" />


            <x-form-components.textarea name="description" value="{{ $data->description }}" label="Description" />


            <label class="mt-4 form-label">Article Tags</label>
            <select class="form-control" name="tags[]" id="choices-multiple-remove-button" multiple>
                <option disabled>--- Choice Tags ---</option>
                @foreach ($tags as $item)
                <option value="{{ $item->id }}" @selected(in_array($item->id, $data->tags->pluck('id')->toArray()))>{{
                    $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <script>
        if (document.getElementById('choices-multiple-remove-button')) {
            var element = document.getElementById('choices-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });
        }
    </script>
</x-form-components.modal>