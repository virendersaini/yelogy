<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
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
    //protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }

    public function redirectTo(){
        
        // User role
        $role = Auth::user()->getRoleNames(); 
        // Check user role
        switch ($role) {
            case 'admin':
                    return '/admin';
                break;
            case 'customer':
                    return '/customer-admin/dashboard';
                break; 
            case 'helper':
                return '/helper-admin/dashboard';
                break; 
            default:
                    return '/login'; 
                break;
        }
    }
}
