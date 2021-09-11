<?php

namespace App\Models\Amulet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmuletMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['amuletmaterial_name'];
}
