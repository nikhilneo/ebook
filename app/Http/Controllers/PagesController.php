<?php

namespace App\Http\Controllers;

use Session;
use App\Book;
use App\Cart;
use App\User;
use App\Order;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    private $pages = ['about','contact', 'error404'];

    // We are inserting all the cart item into DB which is added before Login
    private function updateCartWithSession()
    {
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
            Session::forget('cartData');
            Session::forget('cartTotal');
            Session::forget('cartCount');
        }
        return ;
    }

    // Home Page view will be loaded from here
    public function getIndex()
    {
        $this->updateCartWithSession();
        $newBooks = Book::orderBy('id', 'desc')->limit(4)->get();
        $allBooks = Book::orderBy('id', 'asc')->limit(8)->get();
        return view('pages.index', compact('allBooks', 'newBooks'));
    }
    
    // All the static pages will be loaded form here (which are in $pages array)
    public function getPages($page)
    {
        if (in_array($page, $this->pages)) {
            return view("pages.".$page);
        }

        return view('pages.error404');
    }
    
    // Cart detail page will load from here
    public function cartPage()
    {
        $cart = null;
        $this->updateCartWithSession();
        if (Auth::check()) {
            $cart = Cart::where([
                ['user_id', '=', Auth::user()->id],
                ['status', '=', 'Cart']
            ])->get();
        }
        return view('pages.cart', compact('cart'));
    }
    
    // Login/Registration Page will load form here
    public function loginPage()
    {
        return view('pages.my-account');
    }
    
    // Order Detail Page
    public function orderDetails($id)
    {
        $cart = Order::findOrFail($id);
        return view('pages.cartResult', compact('cart'));
    }
    
    // Profile Page of LoggedIn User
    public function showProfile()
    {
        $this->updateCartWithSession();
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('pages.profile', compact('orders'));
    }
    
    // Change Password Page
    public function showChangePassword()
    {
        $this->updateCartWithSession();
        return view('pages.change-password');
    }
    
    // Change Password Form Processing
    public function editChangePassword(Request $request)
    {
        $messages = [
            'old_password.required'     => 'This field is required',
            'old_password.min'          => 'Please input at least 6 characters',
            'old_password.in'           => 'Please input right Old Password',
            'password.required'         => 'This field is required',
            'password.min'              => 'Please input at least 6 characters',
            'password.confirmed'        => 'New Password Confirmation does not mached'
        ];

        $data = $request->all();
        $admin = User::where('id', '=', Auth::user()->id)->select('password')->first();

        if (Hash::check($data['old_password'], $admin->password)) {
            $pass_arr = $data['old_password'];
        } else {
            $pass_arr = $admin->password;
        }
        
        Validator::make($data   , [
            'old_password' => [
                'required',
                'min:6',
                Rule::in([$pass_arr]),
            ],
            'password'      => 'required|min:6|confirmed'
        ],$messages)->validate();

        $admin = User::find(Auth::user()->id);
        $admin['password'] = bcrypt($data['password']);
        $admin->save();
        $request->session()->flash('userSuccess', 'Your Password has been changed.');
        return redirect('/');
    }
}