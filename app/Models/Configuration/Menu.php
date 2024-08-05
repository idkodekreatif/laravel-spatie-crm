<?php

namespace App\Models\Configuration;

use App\Models\Spatie\Permissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subMenus()
    {
        return $this->hasMany(Menu::class, 'main_menu_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'menu_permission', 'menu_id', 'permissions_id');
    }
}
