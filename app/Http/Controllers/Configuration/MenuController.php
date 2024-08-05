<?php

namespace App\Http\Controllers\Configuration;

use App\DataTables\Configuration\MenuDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\MenuRequest;
use App\Models\Configuration\Menu;
use App\Models\Spatie\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MenuDataTable $menuDataTable)
    {
        Gate::authorize('read configuration/menu');
        return $menuDataTable->render('page.configuration.menu');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Menu $menu)
    {
        Gate::authorize('create configuration/menu');

        $mainMenus = Menu::whereNull('main_menu_id')->select('id', 'name')->get();
        return view('page.configuration.menu-form', [
            'action' => route('configuration.menu.store'),
            'data' => $menu,
            'mainMenus' => $mainMenus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Menu $menu)
    {
        Gate::authorize('create configuration/menu');

        $menu->fill($request->validated());
        $menu->fill([
            'orders' => $request->orders,
            'icon' => $request->icon,
            'category' => $request->category,
            'main_menu_id' => $request->main_menu
        ]);

        $menu->save();

        foreach ($request->permissions as $permission) {
            Permissions::create(['name' => $permission . " {$menu->url}"])->menus()->attach($menu);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Created Data Succesfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
