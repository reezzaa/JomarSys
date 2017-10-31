<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username = 'username';
    protected $redirectTo = '/dashboard';
    protected $guard = 'web';

    public function getLogin()
    {
    	if(Auth::guard('web')->check())
    	{
            \Session::flash('flash_login_success','');
    		return redirect()->route('dashboard');
    	}
        \Session::flash('flash_login_failed','Failed login!');
    	return view('login');
    }
    public function postLogin(Request $request)
    {
    	$auth = Auth::guard('web')->attempt(['username'=>$request->username,'password'=>$request->password,'active'=>1]);
    	if($auth)
    	{
            \Session::flash('flash_login_success','Successfully login!');
    		return redirect()->route('dashboard');
    	}
        \Session::flash('flash_login_failed','Failed login!');
    	return redirect()->route('/');
    }

    public function getLogout()
    {
    	Auth::guard('web')->logout();
        \Session::flash('flash_logout_success','Success!');
    	return redirect()->route('/');
    }
}
