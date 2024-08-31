<?php

namespace App\Http\Controllers\Configuration;

use App\DataTables\Configuration\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\RoleRequest;
use App\Models\Spatie\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        // Gate::authorize('read configuration/menu');
        return $roleDataTable->render('page.configuration.role');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.configuration.role-form', [
            'data' => new Role(),
            'action' => route('configuration.roles.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = new Role($request->validated());
        $role->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('page.configuration.role-form', [
            'data' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('page.configuration.role-form', [
            'action' => route('configuration.roles.update', $role->id),
            'data' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->fill($request->validated());
        $role->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return responseSuccessDelete();
    }
}
