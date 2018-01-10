<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

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
        try
        {

            $this->validate($request,[
                'email' => 'required|min:4|max:255',
                'password' => 'required|min:6|max:20'
            ]);

            $remember = $request->has('remember') ? true : false;
            if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')],$remember))
                {
                    return redirect(route('admin'));
                }return back()->with('error','something wrong');

        }catch(ValidationException $ex)
        {
            \Log::error($ex->getMessage());
            return back()->with('error',$ex->getMessage());
        }
    }
}
