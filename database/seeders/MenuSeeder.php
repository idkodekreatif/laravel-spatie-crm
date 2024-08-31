<?php

namespace Database\Seeders;

use App\Models\Configuration\Menu;
use App\Models\Spatie\Permissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\HasMenuPermission;


class MenuSeeder extends Seeder
{

    use HasMenuPermission;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * @var Menu $mm
         */
        $mm = Menu::firstOrCreate(
            [
                'url' => 'configuration'
            ],
            [
                'name' => 'configuration',
                'category' => 'CONFIGURATION',
                'icon' => 'fas fa-cog',
            ]
        );

        $this->attachMenuPermission($mm, ['read'], ['ceo']);

        $sm = $mm->subMenus()->create([
            'name' => 'Menu',
            'url' => $mm->url . '/menu',
            'category' => $mm->category,
        ]);

        $this->attachMenuPermission($sm, ['create', 'read', 'update', 'delete', 'sort'], ['ceo']);

        $sm = $mm->subMenus()->create([
            'name' => 'Role',
            'url' => $mm->url . '/roles',
            'category' => $mm->category,
        ]);

        $this->attachMenuPermission($sm, ['create', 'read', 'update', 'delete', 'sort'], ['ceo']);

        $sm = $mm->subMenus()->create([
            'name' => 'Permission',
            'url' => $mm->url . '/permissions',
            'category' => $mm->category,
        ]);

        $this->attachMenuPermission($sm, ['create', 'read', 'update', 'delete', 'sort'], ['ceo']);

        $sm = $mm->subMenus()->create([
            'name' => 'User',
            'url' => $mm->url . '/users',
            'category' => $mm->category,
        ]);

        $this->attachMenuPermission($sm, null, ['ceo']);

        $mm = Menu::firstOrCreate(
            [
                'url' => 'master-data'
            ],
            [
                'name' => 'Master Data',
                'category' => 'MASTER DATA',
                'icon' => 'fas fa-book',
            ]
        );

        $this->attachMenuPermission($mm, ['read'], ['ceo']);

        $sm = $mm->subMenus()->create([
            'name' => 'Tags',
            'url' => $mm->url . '/tags',
            'category' => $mm->category,
        ]);

        $this->attachMenuPermission($sm, null, ['ceo']);

        $mm = Menu::firstOrCreate(
            [
                'url' => 'articles'
            ],
            [
                'name' => 'Articles',
                'category' => 'CONTENT',
                'icon' => 'fas fa-book',
            ]
        );

        $this->attachMenuPermission($mm, ['read'], ['ceo']);
    }
}
