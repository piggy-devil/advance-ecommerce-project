<?php

namespace App\Models\Amulet;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmuletAccount extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function user(){
    // 	return $this->belongsTo(User::class,'user_id','id');
    // }
}
