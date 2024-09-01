<x-form-components.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <h5>User: {{ $data->name }}</h5>

            <div class="mb-3 mt-3">
                <x-form-components.select class="copy" label="Copy of user" placeholder="--- Copy user ---"
                    :options="$users" />
                <x-form-components.input name="search" class="search" label="Cari menu" placeholder="Search..." />
            </div>

            <div>
                <table class="table">
                    <thead>
                        <th>Menu</th>
                        <th>Actions</th>
                    </thead>

                    <tbody id="menu_permissions">
                        @include('page.configuration.access-user-item')
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