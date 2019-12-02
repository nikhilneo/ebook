<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use Session;
use Carbon\Carbon;
use Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::paginate(10);
        return view('admin.books.index')->withBooks($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating the data of request
        $this->validate($request, [
            'name'          => 'required|min:5|max:255',
            'publisher'     => 'required|min:5|max:255',
            'author'        => 'required|min:5|max:255',
            'eddition'      => 'required|max:255',
            'publish_date'  => 'required|date',
            'price'         => 'required|regex:/^\d*(\.\d{2})?$/',
            'quantity'      => 'required|numeric',
        ]);
        
        // formatting the date value of the request
        $date = Carbon::parse($request->input('publish_date'));
        $request['publish_date'] =  $date->format('Y-m-d');
        
        // adding data to the database.
        $book = new Book;
        $book['name']          = $request->input('name');
        $book['publisher']     = $request->input('publisher');
        $book['author']        = $request->input('author');
        $book['eddition']      = $request->input('eddition');
        $book['publish_date']  = $request->input('publish_date');
        $book['price']         = $request->input('price');
        $book['quantity']      = $request->input('quantity');
        $book['total']         = $request->input('quantity');
        $book['admin_id']      = Auth::guard('admin')->user()->id;
        $book->save();
        
        // Adding the success message
        $request->session()->flash('success', 'The Book is added to the database');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        //dd($book);
        if (is_null($book)) return view('admin.pages.404');
        return view('admin.books.show')->withBook($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        //dd($book);
        if (is_null($book)) return view('admin.pages.404');
        return view('admin.books.edit')->withBook($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validating the data of request
        $this->validate($request, [
            'name'          => 'required|min:5|max:255',
            'publisher'     => 'required|min:5|max:255',
            'author'        => 'required|min:5|max:255',
            'eddition'      => 'required|max:255',
            'publish_date'  => 'required|date',
            'price'         => 'required|regex:/^\d*(\.\d{2})?$/',
            'admin_id'      => 'required',
            'quantity'      => 'required|numeric',
        ]);
        
        // formatting the date value of the request
        $date = Carbon::parse($request->input('publish_date'));
        $request['publish_date'] =  $date->format('Y-m-d');
        
        // adding data to the database.
        $book                  = Book::find($id);
        $book['name']          = $request->input('name');
        $book['publisher']     = $request->input('publisher');
        $book['author']        = $request->input('author');
        $book['eddition']      = $request->input('eddition');
        $book['publish_date']  = $request->input('publish_date');
        $book['price']         = $request->input('price');
        $book['quantity']      = $request->input('quantity');
        $book['total']         = $request->input('quantity');
        $book['admin_id']      = $request->input('admin_id');
        $book->save();
        
        // Adding the success message
        $request->session()->flash('success', 'The Book data is updated to the database');
        return redirect('admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$request = Request;
        $book = Book::find($id);
        $book->delete();
        Session::flash('success', 'Book Deleted successfully');
        return redirect()->route('books.index');
    }
}
