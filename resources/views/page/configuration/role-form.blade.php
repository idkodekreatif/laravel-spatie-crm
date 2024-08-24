<x-form-components.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <x-form-components.input name="name" value="{{ $data->name }}" label="Name" />
        </div>
        <div class="col-6">
            <x-form-components.input name="guard_name" value="{{ $data->guard_name }}" label="Guard Name" />
        </div>
    </div>

</x-form-components.modal>