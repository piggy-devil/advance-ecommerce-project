<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Amulet\AmuletType;
use App\Http\Controllers\Controller;
use App\Models\Amulet\AmuletAccount;
use App\Models\Amulet\AmuletMaterial;

class AccountController extends Controller
{
    public function AddAccount(){
        $this->authorize('create', AmuletAccount::class);
        $amulettypes = AmuletType::latest()->get();
		$amuletmaterials = AmuletMaterial::latest()->get();
        $amuletaccounts = AmuletAccount::latest()->get();

        return view('frontend.account.view_account', compact('amulettypes', 'amuletmaterials', 'amuletaccounts'));
    }
}
