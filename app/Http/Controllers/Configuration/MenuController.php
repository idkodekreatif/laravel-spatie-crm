<?php

namespace App\Http\Controllers\Configuration;

use App\DataTables\Configuration\MenuDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\MenuRequest;
use App\Models\Configuration\Menu;
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
        return view('page.configuration.menu-form', [
            'action' => route('configuration.menu.store'),
            'data' => $menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Menu $menu)
    {
        $menu->fill($request->validated());
        $menu->fill([
            'orders' => $request->orders,
            'icon' => $request->icon,
        ]);

        $menu->save();

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
