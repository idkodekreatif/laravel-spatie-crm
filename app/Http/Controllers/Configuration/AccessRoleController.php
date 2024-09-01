<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Spatie\Role;
use Illuminate\Http\Request;
use App\DataTables\Configuration\RoleDataTable;
use App\Models\Configuration\Menu;
use App\Repositories\MenuRepository;

class AccessRoleController extends Controller
{

    public function __construct(protected MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('page.configuration.access-role');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        $roles = Role::where('id', '!=', $role->id)->get()->pluck('id', 'name');

        return view('page.configuration.access-role-form', [
            'data' => $role,
            'action' => route('configuration.access-role.update', $role->id),
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);

        return responseSuccess(true);
    }

    public function getPermissionByRole(Role $role)
    {
        return view('page.configuration.access-role-item', [
            'data' => $role,
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
        ]);
    }
}
