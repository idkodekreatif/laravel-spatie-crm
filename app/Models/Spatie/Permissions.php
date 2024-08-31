<?php

namespace App\Models\Spatie;

use App\Models\Configuration\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as ModelsPermissions;

class Permissions extends ModelsPermissions
{
    use HasFactory, SoftDeletes;

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
}
