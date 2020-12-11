<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout','adminLogout');
    // }

    public function shwoAdminLoginForm(){
        return view('admin.auth.login');
    }

    public function storeLogin(Request $req){
        $this->validate($req,[
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        $credential=[
            'email'=> $req->email,
            'password'=> $req->password
        ];

        if(Auth::guard('admin')->attempt($credential,$req->remember)){
            return Redirect()->intended(route('admin.dashboard'));
        }
        return Redirect()->back()->withInput($req->only('email,remember'));
    }

    public function adminLogout(Request $req){
        Auth::guard('admin')->logout();
        return redirect::to('/admin/login');
    }
}
