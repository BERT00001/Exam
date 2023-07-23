<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use View;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {

        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) 
        {    
            if (auth()->user()->admin == 1 && auth()->user()->status == 'Active')
            {
                return redirect()->route('Dashboard');   

            } else if(auth()->user()->admin == 0 && auth()->user()->status == 'Deactive')
            {
                return View('User.index');

            } else{
                return View('Welcome');         
            }

            } else{
            return redirect()->route('login')->with('error', 'Wrong Credential');
            }
        }


}