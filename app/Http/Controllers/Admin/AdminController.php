<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use App\Book;
use App\User;
use App\Admin;
use App\Order;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        // $this->middleware('checkAdmin');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->orderBy('id','desc')->get();
        $orders = Order::orderBy('id','desc')->get();
        $books_count = Book::count();
        return view('admin.pages.index')->withOrders($orders)->withUsers($users)->withBooks($books_count);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = new Admin;
        
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password = bcrypt($request['password']);
        $admin->save();
        $request->session()->flash('success', 'Admin Registration Complete');
        return redirect()->route('admin.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        $books = Book::where('admin_id', '=', $id)->paginate(10);
        return view('admin.pages.show')->withAdmin($admin)->withBooks($books);
    }
    
    
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.pages.edit')->withAdmin($admin);
    }
    
    
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
       
        if ($request->email === $admin->email) {
            
            $this->validate($request,[
                'name' => 'required|max:255',
            ]);
        } else {
            
            $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:admins'
            ]);
        }
        
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->save();
        $request->session()->flash('success', 'Admin Details Updated');
        return redirect()->route('admin.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        Session::flash('success', 'Admin Deleted');
        return redirect()->route('admin.list');
    }

    /* Some Other Function used for Admin */

    public function showProfile()
    {
        $books = Book::where('admin_id', '=', Auth::guard('admin')->user()->id)->orderBy('id','desc')->paginate(10);
        return view('admin.pages.profile')->withBooks($books);
    }
    

    public function otherAdmins()
    {   
        $admins = Admin::select('id', 'name', 'email', 'created_at')->where('id', '<>', Auth::guard('admin')->user()->id)->orderBy('id','desc')->paginate(15);
        return view('admin.pages.list')->withAdmins($admins);
    }

    
    public function changePassword(Request $request)
    {
        $messages = [
            'old_password.required'     => 'This field is required',
            'old_password.min'          => 'Please input at least 6 characters',
            'old_password.in'           => 'Please input right Old Password',
            'new_password.required'     => 'This field is required',
            'new_password.min'          => 'Please input at least 6 characters',
            'new_password.confirmed'    => 'New Password Confirmation does not mached'
        ];

        $data = $request->all();
        $admin = Admin::where('id', '=', Auth::guard('admin')->user()->id)->select('password')->first();

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
            'new_password'      => 'required|min:6|confirmed'
        ],$messages)->validate();

        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin['password'] = bcrypt($data['new_password']);
        $admin->save();
        $request->session()->flash('success', 'Your Password has been changed.');
        return redirect()->route('admin.profile');
    }


    /**
     * Here is some functions for the User
     * Basically we will create update delete a user here.
     * This functionality will be for every Admin
     * We are giving the every control to Admin
     */

      
    public function users()
    {   
        $users = User::select('id', 'name', 'email', 'created_at')->orderBy('id','desc')->paginate(15);
        return view('admin.pages.usersList')->withUsers($users);
    }

    public function userCreate()
    {
        return view('admin.pages.userRegister');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User;
        
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $request->session()->flash('success', 'User Registration Complete');
        return redirect()->route('admin.user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userShow($id)
    {
        $user = User::find($id);
        // $books = Book::where('admin_id', '=', $id)->paginate(10);
        // return view('admin.pages.show')->withAdmin($admin)->withBooks($books);
        return view('admin.pages.userShow')->withUser($user);
    }
    
    
    public function userEdit($id)
    {
        $user = User::find($id);
        return view('admin.pages.userEdit')->withUser($user);
    }
    
    
    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
       
        if ($request->email === $user->email) {
            
            $this->validate($request,[
                'name' => 'required|max:255',
            ]);
        } else {
            
            $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:admins'
            ]);
        }
        
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        $request->session()->flash('success', 'User Details Updated');
        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'User Deleted');
        return redirect()->route('admin.user');
    }
}
