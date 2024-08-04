<?php

namespace Database\Seeders;

use App\Models\Spatie\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'writer']);
        Role::create(['name' => 'editor']);
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'ceo']);
        Role::create(['name' => 'user']);
    }
}
