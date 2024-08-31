<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Spatie\Role;
use Illuminate\Http\Request;
use App\DataTables\Configuration\RoleDataTable;
use App\Models\Configuration\Menu;

class AccessRoleController extends Controller
{
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
        $menus = Menu::with('permissions', 'subMenus.permissions')->whereNull('main_menu_id')->get();

        return view('page.configuration.access-role-form', [
            'data' => $role,
            'action' => route('configuration.access-role.update', $role->id),
            'menus' => $menus,
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
}
