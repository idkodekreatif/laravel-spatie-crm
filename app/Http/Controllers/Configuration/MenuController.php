<?php

namespace App\Http\Controllers\Configuration;

use App\DataTables\Configuration\MenuDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\MenuRequest;
use App\Models\Configuration\Menu;
use App\Models\Spatie\Permissions;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    public function __construct(private MenuRepository $repository)
    {
        $this->repository = $repository;
    }

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

        return view('page.configuration.menu-form', [
            'action' => route('configuration.menu.store'),
            'data' => $menu,
            'mainMenus' => $this->repository->getMainMenus()
        ]);
    }


    private function fillData(MenuRequest $request, Menu $menu)
    {
        $menu->fill($request->validated());
        $menu->fill([
            'orders' => $request->orders,
            'icon' => $request->icon,
            'category' => $request->category,
            'main_menu_id' => $request->main_menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Menu $menu)
    {
        DB::beginTransaction();
        try {
            Gate::authorize('create configuration/menu');

            $this->fillData($request, $menu);
            $menu->save();

            foreach ($request->permissions ?? [] as $permission) {
                Permissions::create(['name' => $permission . " {$menu->url}"])->menus()->attach($menu);
            }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            return responseError($th);
        }

        return responseSuccess();
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
        Gate::authorize('update configuration/menu');

        return view('page.configuration.menu-form', [
            'action' => route('configuration.menu.update', $menu->id),
            'data' => $menu,
            'mainMenus' => $this->repository->getMainMenus()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        Gate::authorize('update configuration/menu');

        $this->fillData($request, $menu);
        if ($request->level_menu == 'main_menu') {
            $menu->main_menu_id = null;
        }
        $menu->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
