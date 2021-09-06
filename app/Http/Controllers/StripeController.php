<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){


    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
            $getTotal = Cart::total();
            $removeDot = str_replace('.', '', $getTotal);
            $removeComma = str_replace(',','', $removeDot);
            $total_amount = $removeComma / 100;
    	}
 
	// \Stripe\Stripe::setApiKey('sk_test_51IUTWzALc6pn5BvMjaRW9STAvY4pLiq1dNViHoh5KtqJc9Bx7d4WKlCcEdHOJdg3gCcC2F19cDxUmCBJekGSZXte00RN2Fc4vm');

	 
	// $token = $_POST['stripeToken'];
	// $charge = \Stripe\Charge::create([
	//   'amount' => $total_amount*100,
	//   'currency' => 'usd',
	//   'description' => 'Easy Online Store',
	//   'source' => $token,
	//   'metadata' => ['order_id' => uniqid()],
	// ]);

	  // dd($charge);
    //   dd($total_amount);

	$order_id = Order::insertGetId([
		'user_id' => Auth::id(),
		'division_id' => $request->division_id,
		'district_id' => $request->district_id,
		'state_id' => $request->state_id,
		'name' => $request->name,
		'email' => $request->email,
		'phone' => $request->phone,
		'post_code' => $request->post_code,
		'notes' => $request->notes,

		'payment_type' => 'Stripe',
		'payment_method' => 'Stripe',

		// 'currency' =>  'Usd',
		'amount' => $total_amount,


		'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
		'order_date' => Carbon::now()->format('d F Y'),
		'order_month' => Carbon::now()->format('F'),
		'order_year' => Carbon::now()->format('Y'),
		'status' => 'pending',
		'created_at' => Carbon::now(),	 

	]);

     $carts = Cart::content();
     foreach ($carts as $cart) {
     	OrderItem::insert([
     		'order_id' => $order_id, 
     		'product_id' => $cart->id,
     		'color' => $cart->options->color,
     		'size' => $cart->options->size,
     		'qty' => $cart->qty,
     		'price' => $cart->price,
     		'created_at' => Carbon::now(),

     	]);
     }


     if (Session::has('coupon')) {
     	Session::forget('coupon');
     }

     Cart::destroy();

     $notification = array(
			'message' => 'Your Order Place Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);
 

    } // end method 
}
