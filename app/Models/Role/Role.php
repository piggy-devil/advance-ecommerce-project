<?php

namespace App\Models\Role;

use App\Models\Role\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }
}
