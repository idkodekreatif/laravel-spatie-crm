<?php

namespace App\Http\Controllers\Configuration;

use App\DataTables\Configuration\PermissionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\PermisssionRequest;
use App\Models\Permission;
// use App\Models\Spatie\Permissions;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PermissionsDataTable $permissionsDataTable)
    {
        return $permissionsDataTable->render('page.configuration.permission');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.configuration.permission-form', [
            'data' => new Permission(),
            'action' => route('configuration.permissions.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermisssionRequest $request)
    {
        $permission = new Permission($request->validated());
        $permission->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('page.configuration.permission-form', [
            'data' => $permission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('page.configuration.permission-form', [
            'data' => $permission,
            'action' => route('configuration.permissions.update', $permission->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermisssionRequest $request, Permission $permission)
    {
        $permission->fill($request->validated());
        $permission->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return responseSuccessDelete();
    }
}
