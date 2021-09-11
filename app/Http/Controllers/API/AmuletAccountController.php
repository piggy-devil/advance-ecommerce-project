<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Amulet\AmuletType;
use App\Http\Controllers\Controller;
use App\Models\Amulet\AmuletAccount;
use App\Models\Amulet\AmuletMaterial;
use Illuminate\Support\Facades\Auth;

class AmuletAccountController extends Controller
{
    public function AddAmuletAccount()
	{
		$amulettypes = AmuletType::latest()->get();
		$amuletmaterials = AmuletMaterial::latest()->get();
		return view('backend.amulet.amulet_account.amuletaccount_add', compact('amulettypes', 'amuletmaterials'));
	}

    public function StoreAmuletAccount(Request $request)
	{

		// $image = $request->file('product_thambnail');
		// $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
		// Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
		// $save_url = 'upload/products/thambnail/' . $name_gen;

        $totalfee = (int) $request->rentfrom + (int) $request->amuletrental + (int) $request->shippingfee + (int) $request->warrantyfee + (int) $request->otherfee;

		$product_id = AmuletAccount::insertGetId([

			'user_id' => Auth::user()->id,
			'amulettype_id' => $request->amulettype_id,
			'amuletmaterial_id' => $request->amuletmaterial_id,
			'year' => $request->year,
			'namepra' => $request->namepra,
			'namemodel' => $request->namemodel,
			'tample' => $request->tample,
			'rentaldate' => $request->rentaldate,
			'rentaltime' => $request->rentaltime,
			'quantity' => $request->quantity,
			'placefrom' => $request->placefrom,
			'rentfrom' => $request->rentfrom,
			'amuletrental' => $request->amuletrental,
			'shippingfee' => $request->shippingfee,
			'warrantyfee' => $request->warrantyfee,
			'otherfee' => $request->otherfee,
			'note' => $request->note,
			'totalfee' => $totalfee,
			// 'pic_thambnail' => $request->pic_thambnail,
			'created_at' => Carbon::now(),

		]);


		////////// Multiple Image Upload Start ///////////

		// $images = $request->file('multi_img');
		// foreach ($images as $img) {
		// 	$make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
		// 	Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
		// 	$uploadPath = 'upload/products/multi-image/' . $make_name;

		// 	MultiImg::insert([

		// 		'product_id' => $product_id,
		// 		'photo_name' => $uploadPath,
		// 		'created_at' => Carbon::now(),

		// 	]);
		// }

		////////// Een Multiple Image Upload Start ///////////


		$notification = array(
			'message' => 'คุณทำการเพิ่มรายการพระเครื่องเข้ามาใหม่ เรียบร้อยแล้ว',
			'alert-type' => 'success'
		);

		return redirect()->route('manage-amulet-account')->with($notification);
	} // end method

    public function ManageAmuletAccount()
	{

		$amuletaccounts = AmuletAccount::latest()->get();
		return view('backend.amulet.amulet_account.amuletaccount_view', compact('amuletaccounts'));
	}
}
