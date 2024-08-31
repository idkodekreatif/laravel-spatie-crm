@foreach ($menus as $mm)
<tr>
    <td>{{ $mm->name }}</td>
    <td>
        @foreach ($mm->permissions as $permission)
        <div class="form-check form-check-inline form-switch">
            <input class="form-check-input" name="permissions[]" @checked($data->hasPermissionTo($permission->name))
            type="checkbox"
            value="{{ $permission->name }}"
            id="permission-{{ $mm->id.'-'.$permission->id }}">
            <label class="form-check-label ms-1" for="permission-{{ $mm->id.'-'.$permission->id }}">{{ explode(' ',
                $permission->name)[0] }}</label>
        </div>
        @endforeach
    </td>
</tr>
<tr>
    @foreach ($mm->subMenus as $sm)
<tr>
    <td>&nbsp; &nbsp; &nbsp;
        <x-form-components.checkbox id="parent{{ $mm->id.$sm->id }}" name="parent" label="{{ $sm->name }}"
            class="parent" />
    </td>
    <td>
        @foreach ($sm->permissions as $permission)
        <div class="form-check form-check-inline form-switch">
            <input class="form-check-input child" name="permissions[]"
                @checked($data->hasPermissionTo($permission->name))
            type="checkbox"
            value="{{ $permission->name }}"
            id="permission-{{ $sm->id.'-'.$permission->id }}">
            <label class="form-check-label ms-1" for="permission-{{ $sm->id.'-'.$permission->id }}">{{ explode(' ',
                $permission->name)[0] }}</label>
        </div>
        @endforeach
    </td>
</tr>
@endforeach
</tr>
@endforeach