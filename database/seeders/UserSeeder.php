<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = ['writer', 'editor', 'administrator', 'ceo', 'user'];

        $default = [
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ];

        foreach ($users as $value) {
            User::create([...$default, ...[
                'name' => $value,
                'email' => $value . '@kodekreatif.com',
            ]])->assignRole($value);
        }
    }
}
