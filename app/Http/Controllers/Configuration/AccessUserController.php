<?php

namespace App\Http\Controllers\Configuration;

use App\DataTables\Configuration\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AccessUserController extends Controller
{
    public function __construct(protected MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('page.configuration.access-user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('page.configuration.access-user-form', [
            'data' => $user,
            'users' => User::where('id', '!=', $user->id)->get()->pluck('id', 'name'),
            'action' => null,
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('page.configuration.access-user-form', [
            'data' => $user,
            'users' => User::where('id', '!=', $user->id)->get()->pluck('id', 'name'),
            'action' => route('configuration.access-user.update', $user->id),
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);

        return responseSuccess(true);
    }

    public function getPermissionByUser(User $user)
    {
        return view('page.configuration.access-user-item', [
            'data' => $user,
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
        ]);
    }
}
