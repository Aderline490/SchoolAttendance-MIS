<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    // public function authenticate(Request $request)
    // {

    //     $adminCredentials = $request->only('email', 'password');

    //     // check user using auth function
    
    //   if ($admin= Admin::where($adminCredentials)->first()) {
    //       auth()->login($admin);

    //       $data= Admin::where($adminCredentials)->first();
    //       // redirect to the intended view
    //       return view('admin.index')->with(['data' => $data]);
    //    }
    //     else {
    //        // redirect to the view on failure to authenticate with a failure message
    //     }
    
    // }

}
