<?php

namespace Database\Seeders;

use App\Models\Configuration\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mm = Menu::create([
            'name' => 'configuration',
            'url' => 'configuration',
            'category' => 'MASTER DATA',
            'icon' => 'fas fa-cog',
        ]);

        $mm->subMenus()->create([
            'name' => 'Menu',
            'url' => $mm->url . '/menu',
            'category' => $mm->category,
        ]);
    }
}
