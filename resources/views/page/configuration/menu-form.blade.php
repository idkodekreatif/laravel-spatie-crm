<x-form-components.modal title="Form Modal" action="{{ $action }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="col-6">
            <x-form-components.input name="name" value="{{ $data->name }}" label="Name" placeholder="Name" />
        </div>
        <div class="col-6">
            <x-form-components.input name="icon" value="{{ $data->icon }}" label="Icon" placeholder="fas fa-icon" />
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <x-form-components.input name="category" value="{{ $data->category }}" label="Category"
                placeholder="Category" />
        </div>
        <div class="col-6">
            <x-form-components.input name="url" value="{{ $data->url }}" label="Url" placeholder="Url" />
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <x-form-components.input name="orders" value="{{ $data->orders }}" label="Orders" placeholder="Orders" />
        </div>
        <div class="col-6">
            <x-form-components.radio inline="true" name="level_menu" label="Level Menu"
                :options="['Main menu' => 'main_menu', 'Sub Menu' => 'sub_menu']"
                :value="$data->main_menu_id ? 'sub_menu' : 'main_menu'" />
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div id="main_menu_wrapper" class="{{ !$data->main_menu_id ? 'd-none' : '' }}">
                <x-form-components.select name="main_menu" value="{{ $data->main_menu_id }}" label="Main Menu"
                    placeholder="Pilih Main Menu" :options="$mainMenus" />
            </div>
        </div>
    </div>

    <div class="row">
        @if (!$data->id)
        <div class="col-12">
            <label class="form-label">Permission</label>
            <div class="mb-3">
                @foreach (['create', 'read', 'update', 'delete'] as $item)
                <div class="form-check form-check-inline">
                    <x-form-components.checkbox name="permissions[]" id="{{ $item }}_permissions" value="{{ $item }}"
                        label="{{ $item }}" />
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</x-form-components.modal>