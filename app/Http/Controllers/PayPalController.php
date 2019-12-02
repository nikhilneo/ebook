<?php

namespace App\Http\Controllers;
use PayPal;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    private $provider;
    private $cart;
    
    // We are setting the cart data from here
    private function setCartData()
    {
        $this->cart = [];
        $cart = Session::get('cartData');
        if (Auth::check() && Session::has('cartData')) {
            $session_cart = Session::get('cartData');
            foreach ($session_cart as $value) {
                
                $cart = Cart::where([
                    ['user_id', '=', Auth::user()->id],
                    ['book_id', '=', $value['id']],
                    ['status', '=', 'Cart']
                ])->first();
                
                if ($cart === null) {
                    $cart = new Cart;
                }
    
                $cart->book_id         = $value['id']; 
                $cart->book_name       = $value['name']; 
                $cart->price           = $value['price']; 
                $cart->quantity        = $value['quantity']; 
                $cart->grand_total     = $value['grand_total']; 
                $cart->user_id         = Auth::user()->id;
                $cart->status          = 'Cart';
                $cart->save();
            }
        }
        Session::forget('cartData');
        Session::forget('cartTotal');
        Session::forget('cartCount');

        $cart = null;
        $cart = Cart::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'Cart']
        ])->get();
        $ttl = [];
        foreach ($cart as $cartData) {
            $ttl[] = $cartData->book->quantity;
            $this->cart['items'][] = [
                'name' => $cartData['book_name'],
		        'price' => $cartData['price'],
		        'desc'  => $cartData['book_name']." ". $cartData['quantity']." *  ".$cartData['price']." = ". ($cartData['quantity'] *  $cartData['price']),
		        'qty' => $cartData['quantity']
            ];
        }
        
		$this->cart['invoice_id'] = "Order".Auth::user()->id.date('Ymdhis');
		$this->cart['invoice_description'] = "Order #{$this->cart['invoice_id']} Invoice";
		$this->cart['return_url'] = url('/paypal-success');
		$this->cart['cancel_url'] = url('/paypal-cancel');

		$total = 0;
		foreach($this->cart['items'] as $item) {
		    $total += $item['price']*$item['qty'];
		}

		$this->cart['total'] = $total;

		//give a discount of 10% of the order amount
        $this->cart['shipping_discount'] = 0;
        // $response = $this->provider->setCurrency('INR')->setExpressCheckout($this->cart);
    }

    // creating paypal object with config
    public function __construct()
    {
    	$config = config('paypal');
    	$this->provider = PayPal::setProvider('express_checkout'); 
        $this->provider->setApiCredentials($config);
    }

    // Request for payment with paypal
    public function requestCheckOut(Request $request)
    {
        try {
            $this->setCartData();
            //$this->provider->setCurrency("EUR");
            $response = $this->provider->setExpressCheckout($this->cart);
            
            return redirect($response['paypal_link']);
        } catch (\Exception $e) {
            Session::flash('userError', 'Payment Error Occurred.'.$e->getMessage());
            return redirect('/cart');
        }
    }

    // After successful Payment this function wil get executed
    public function responseCheckOut(Request $request)
    {
        try {
            $this->setCartData();
            $response = $this->provider->getExpressCheckoutDetails($request->token);
            $token = $response['TOKEN'];
            $PayerID = $response['PAYERID'];
            $response = $this->provider->doExpressCheckoutPayment($this->cart, $token, $PayerID);
    	    return redirect()->route('create.order');
        } catch (\Exception $e) {
            
            Session::flash('userError', 'Payment Error.');
            return redirect('/cart');
        }
    	
    }

    // When we cancel the Payment this function will get executed
    public function cancelCheckOut()
    {
    	Session::flash('userError', 'Payment Canceled.');
    	return redirect('/cart');
    }
}
