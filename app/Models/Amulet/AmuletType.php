<?php

namespace App\Models\Amulet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmuletType extends Model
{
    use HasFactory;

    protected $fillable = ['amulettype_name'];
}
