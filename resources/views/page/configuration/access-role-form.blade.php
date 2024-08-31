<x-form-components.modal title="Form Modal" action="{{ $action ?? null }}">
    @if ($data->id)
    @method('put')
    @endif

    <div class="row">
        <div class="col-12">
            <h5>Role: {{ $data->name }}</h5>
            <div>
                <table class="table">
                    <thead>
                        <th>Menu</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @foreach ($menus as $mm)
                        <tr>
                            <td>{{ $mm->name }}</td>
                            <td>
                                @foreach ($mm->permissions as $permission)
                                <div class="form-check form-check-inline form-switch">
                                    <input class="form-check-input" name="permissions[]"
                                        @checked($data->hasPermissionTo($permission->name))
                                    type="checkbox"
                                    value="{{ $permission->name }}"
                                    id="permission-{{ $mm->id.'-'.$permission->id }}">
                                    <label class="form-check-label ms-1"
                                        for="permission-{{ $mm->id.'-'.$permission->id }}">{{ explode(' ',
                                        $permission->name)[0] }}</label>
                                </div>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            @foreach ($mm->subMenus as $sm)
                        <tr>
                            <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $sm->name }}</td>
                            <td>
                                @foreach ($sm->permissions as $permission)
                                <div class="form-check form-check-inline form-switch">
                                    <input class="form-check-input" name="permissions[]"
                                        @checked($data->hasPermissionTo($permission->name))
                                    type="checkbox"
                                    value="{{ $permission->name }}"
                                    id="permission-{{ $sm->id.'-'.$permission->id }}">
                                    <label class="form-check-label ms-1"
                                        for="permission-{{ $sm->id.'-'.$permission->id }}">{{ explode(' ',
                                        $permission->name)[0] }}</label>
                                </div>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                        </tr>
                        @endforeach
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