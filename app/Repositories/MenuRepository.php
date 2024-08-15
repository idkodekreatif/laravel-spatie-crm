<?php

namespace App\Repositories;

use App\Models\Configuration\Menu;

class MenuRepository
{
    // Implement your menu repository methods here
    public function getMainMenus()
    {
        return Menu::whereNull('main_menu_id')->select('id', 'name')->get()
            ->flatMap(function ($item) {
                return [$item->name => $item->id];
            });
    }
}
