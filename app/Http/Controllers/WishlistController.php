<?php

namespace App\Http\Controllers;

use Session;
use App\Book;
use App\User;
use App\Wishlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
       return view('pages.wish-list', compact('wishlists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required|numeric'
        ]);
        $wishlist = new Wishlist;
        $wishlist->book_id = $request->book_id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();
        Session:: flash('userSuccess', 'Book is added into your wishlist.');
        return redirect()->route('books.view', $request->book_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        Session::flash('userSuccess', 'Wishlist Deleted successfully');
        return redirect(url()->previous());
    }
}
