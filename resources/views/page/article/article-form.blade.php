<x-form-components.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <x-form-components.input name="title" value="{{ $data->title }}" label="Title" />
        </div>

        <div class="form-group">
            <x-form-components.textarea name="description" value="{{ $data->description }}" label="Description" />
        </div>
    </div>
</x-form-components.modal>