<?php

namespace App\Http\Controllers\User;

use PDF;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
	public function MyOrders()
	{

		$orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
		return view('frontend.user.order.order_view', compact('orders'));
	}

	public function OrderDetails($order_id)
	{

		$order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
		$orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
		return view('frontend.user.order.order_details', compact('order', 'orderItem'));
	} // end mehtod

	public function ShowInvoice($order_id)
	{
		$order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
		$orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
		
		return view('frontend.user.order.order_invoice',compact('order','orderItem'));
	} // end mehtod
	 
	public function InvoiceDownload($order_id)
	{
		$order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
		$orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

		// view()->share('frontend.user.order.order_invoice',compact('order', 'orderItem'));

		$pdf = PDF::loadView('frontend.user.order.order_invoice_dowload', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
			'tempDir' => public_path(),
			'chroot' => public_path(),
		]);
		// return $pdf->download('invoice.pdf');
		return $pdf->stream('invoice.pdf');
	} // end mehtod 

	public function ReturnOrder(Request $request,$order_id){

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
			'return_order' => 1,
        ]);


      $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);

    } // end method

	public function ReturnOrderList(){

        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order_view',compact('orders'));

    } // end method 

	public function CancelOrders(){

        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order_view',compact('orders'));

    } // end method 

}

