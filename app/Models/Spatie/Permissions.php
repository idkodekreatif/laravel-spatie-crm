<?php

namespace App\Models\Spatie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermissions;

class Permissions extends ModelsPermissions
{
    use HasFactory;
}
