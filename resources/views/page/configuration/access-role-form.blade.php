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
                                    <input class="form-check-input" type="checkbox" id="action-create">
                                    <label class="form-check-label ms-1" for="action-create">{{ explode(' ',
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
                                    <input class="form-check-input" type="checkbox" id="action-create">
                                    <label class="form-check-label ms-1" for="action-create">{{ explode(' ',
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
