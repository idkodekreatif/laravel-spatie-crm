<?php

namespace App\Models\Spatie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles'; // Specifies the table name explicitly, although this is the default for Spatie's Role model.
    protected $guarded = []; // Indicates that all attributes are mass assignable.

    // If you wish to specify attributes that should not be mass assignable, use guarded or fillable properties.
    // The guarded property means no attributes are protected from mass assignment, which can be risky if not handled carefully.
}
