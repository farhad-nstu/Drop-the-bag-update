<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use App\Order;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmsOrder;
use Auth;
use PayPal;
use DNS1D;
use DNS2D;
use QrCode;
   
class PayPalController extends Controller
{ 

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentView($last_id)
    {
        // echo DNS2D::getBarcodeHTML("4445645656", "QRCODE");
        // echo "<br>";
        // echo DNS2D::getBarcodePNGPath("4445645656", "PDF417");
        // echo "<br>";
        // echo DNS2D::getBarcodeSVG("4445645656", "DATAMATRIX");
        
       
        
    	Session::put('order_id', $last_id);
    	$row = Order::where('id', $last_id)->first();
    	return view('front.payment', compact('row'));
    }


    public function payment()
    {
        // dd(Auth::id());
        // $barcode = DNS1D::getBarcodeSVG("4445645656", "PHARMA2T");

    	$provider = new ExpressCheckout;
    	$last_id = Session::get('order_id');
    	$order = Order::findOrFail($last_id);
    	// dd($order);
       	$data = [];
		$data['items'] = [
		    [
		        'name' => 'Bag',
		        'price' => $order->price,
		        'desc'  => 'Description for Bag',
		        'qty' => 1,
		    ]
		];

		$data['invoice_id'] = $order->id;
		$data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
		$data['return_url'] = url('payment/success');
		$data['cancel_url'] = url('payment/cancel');
		$data['total'] = $order->price;
		Session::put('data', $data);
		
		$response = $provider->setExpressCheckout($data);
		// dd($response);
		return redirect($response['paypal_link']);
		
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
    	/*dd($request->all());*/
    	$provider = new ExpressCheckout;
        $data = Session::get('data');
        $checkout_details = $provider->getExpressCheckoutDetails($request->token);
        $response = $provider->doExpressCheckoutPayment($data, $request->token, $request->PayerID);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
        	$last_id = Session::get('order_id');
    		$order = Order::findOrFail($last_id);
    		$order->trx_id = $response['PAYMENTINFO_0_TRANSACTIONID'];
    		$order->save();
            
            
            //$barcode = DNS2D::getBarcodePNGPath("4445645656", "PDF417",10,4,array(1,1,1), true);
            $barcode = \Storage::disk('public')->put($order->id.'.png',DNS2D::getBarcodePNGPath($order->id, "QRCODE"));
            $image = $order->id.'.png';
            
            // dd($path);
    		Mail::to(Auth::user()->email)->send(new ConfirmsOrder($image));
            return redirect('/home');
        }
    }
}