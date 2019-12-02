<?php

namespace App\Http\Controllers;
use Session;
use App\Book;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Add to cart will processed form here
    public function cartAdd(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);
        
        $book = Book::findOrFail($request->book_id);
        if (Auth::check()) {
            $cart = Cart::where([
                ['user_id', '=', Auth::user()->id],
                ['book_id', '=', $book->id],
                ['status', '=', 'Cart']
            ])->first();
            
            if ($cart === null) {
                $cart = new Cart;
            }

            $cart->book_id         = $book['id']; 
            $cart->book_name       = $book['name']; 
            $cart->price           = $book['price']; 
            $cart->quantity        = $request['quantity']; 
            $cart->grand_total     = ($book['price']*$request['quantity']); 
            $cart->user_id         = Auth::user()->id;
            $cart->status          = 'Cart';
            $cart->save();
            
        } else {
            $cart = [];
            $cart[$book->id] = [
                'id' => $book->id,
                'name' => $book->name,
                'price' => $book->price,
                'quantity' => ($request['quantity']+0),
                'grand_total' => ($book['price']*$request['quantity']),
                'total_quantity' => $book['quantity'],
            ];

            if (!Session::has('cartData')) {
                Session::put('cartData', $cart);
                Session::put('cartCount', 1);
                Session::put('cartTotal', $cart[$book->id]['grand_total']);
            } else {
                $session_cart = [];
                $session_cart = Session::get('cartData');
                $session_cart[$book->id] = $cart[$book->id];
                
                $grand_total = 0;
                foreach ($session_cart as $value) {
                    $grand_total += $value['grand_total'];
                }
                
                
                Session::forget('cartData');
                Session::put('cartData', $session_cart);
                Session::put('cartCount',count($session_cart));
                Session::put('cartTotal', $grand_total);
            }
        }

        // Adding success message
        Session::flash('userSuccess', 'Book is added to cart');
        return redirect($request->prevUrl);
    }
    
    // Remove to cart Logic is here
    public function cartRemove($id)
    {
        if (Auth::check()) {
            $cart = Cart::where([
                ['user_id', '=', Auth::user()->id],
                ['book_id', '=', $id],
                ['status', '=', 'Cart']
            ])->first();
            
            $cart->status          = 'Removed';
            $cart->save(); 
        } else {
            $cart = Session::get('cartData');
            unset($cart[$id]);
            Session::forget('cartData');
            
            
            if (count($cart) > 0) {
                
                $grand_total = 0;
                foreach ($cart as $value) {
                    $grand_total += $value['grand_total'];
                }
                Session::put('cartData', $cart);
                Session::put('cartCount',count($cart));
                Session::put('cartTotal', $grand_total);
            } else {
                Session::put('cartCount',0);
                Session::forget('cartTotal');
            }
        }
        
        // Adding success message
        Session::flash('userSuccess', 'Book is added to cart');
        return redirect()->route('cart.show');
    }
    
    // Increase or Decrease quantity of any book from cart will processed form here
    public function cartUpdate(Request $request)
    {
        if (Auth::check()) {
            $cart = Cart::where([
                ['user_id', '=', Auth::user()->id],
                ['book_id', '=', $request['book_id']],
                ['status', '=', 'Cart']
            ])->first();
            $cart->quantity        = $request['quantity']; 
            $cart->grand_total     = ($cart['price']*$request['quantity']); 
            $cart->save();
            return ;

        } else {
            $cart = Session::get('cartData');
            $cart[$request['book_id']]['quantity'] = $request['quantity'];
            $cart[$request['book_id']]['grand_total'] = ($cart[$request['book_id']]['price']*$request['quantity']);
            
            $grand_total = 0;
            foreach ($cart as $value) {
                $grand_total += $value['grand_total'];
            }

            Session::forget('cartData');
            Session::put('cartData', $cart);
            Session::put('cartTotal', $grand_total);
            return ;
        }
        
        
        return $request;
    }

    // Insertion of order from cart after successful payment is here
    public function createOrder()
    {
        $url = url()->previous();
        $val = substr( $url, 0, strrpos( $url, "?"));
        
        // Preventing form Unauthorized access
        if ($val === url('/').'/paypal-success') {
           
            // Fetching cart data of logged in user
            $cart = Cart::where([
                ['user_id', '=', Auth::user()->id],
                ['status',  '=', 'Cart']
            ])->get();
            
            // Claculating grand total of cart
            $grand_total = 0;
            foreach ($cart as $cartData) {
            $grand_total += $cartData['grand_total'];
            }

            // Inserting the cart to Order table
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status  = 'Placed';
            $order->grand_total = $grand_total;
            $order->save();

            // Making Pviot data of order to link with book
            $book_ids = [];
            $cart_ids = [];
            $caseData = "UPDATE `books` SET `quantity` = (CASE `id`";
            foreach ($cart as $cartData) {
                $book_ids[$cartData['book_id']] = [
                    'order_id'      => $order->id,
                    'quantity'      => $cartData['quantity'],
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ];
                $cart_ids[] = $cartData['id'];
                $caseData  .= " WHEN ".$cartData['book_id']." THEN ".($cartData->book->quantity-$cartData['quantity']);
            }

            $caseData .= " END), `updated_at` = '".date('Y-m-d H:i:s')."' WHERE `id` IN (".implode(',', array_keys($book_ids)).")";

            // Syncing Pviot table
            $order->books()->sync($book_ids);

            // Updating Cart table Status
            Cart::whereIn('id', $cart_ids)->update(['status'=>'CheckedOut']);

            // Updating Books Table quantity for each book in order
            DB::statement($caseData);

            // Setting success message for user
            Session::flash('userSuccess', 'Checkout process completed');
            return redirect()->route('show.cart.details', $order->id);
        }
        return redirect('/error404');
    }
}
