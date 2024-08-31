<x-form-components.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <h5>Role: {{ $data->name }}</h5>

            <div class="mb-3 mt-3">
                <x-form-components.select class="copy-role" label="Pilih dari role" placeholder="Pilih role" name="role"
                    :options="$roles" />
            </div>

            <div>
                <table class="table">
                    <thead>
                        <th>Menu</th>
                        <th>Actions</th>
                    </thead>

                    <tbody id="menu_permissions">
                        @include('page.configuration.access-role-item')
                    </tbody>

                    <tfoot>
                        <th>Menu</th>
                        <th>Actions</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</x-form-components.modal>