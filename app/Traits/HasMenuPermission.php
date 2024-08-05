<?php

namespace App\Traits;

use App\Models\Configuration\Menu;
use App\Models\Spatie\Permissions;

trait HasMenuPermission
{
    /**
     * Attach menu permissions.
     *
     * @param Menu $menu
     * @param array|null $permissions
     */
    public function attachMenuPermission(Menu $menu, array | null $permissions, array | null $roles)
    {
        if (!is_array($permissions)) {
            $permissions = ['create', 'read', 'update', 'delete'];
        }

        foreach ($permissions as $value) {
            // Create a new permission with a space between the action and the menu URL
            $permission = Permissions::create([
                'name' => $value . ' ' . $menu->url
            ]);

            // Attach the permission to the menu
            $permission->menus()->attach($menu);

            if ($roles) {
                // Assign a role to the permission if needed
                $permission->assignRole($roles);
            }
        }
    }
}
