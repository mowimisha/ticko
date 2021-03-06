<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Alert;
use Auth;
use Session;
use Cache;
use Cookie;

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
    protected $redirectTo = '/admin-dash';

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
        $messages = [
            'email.required' => "Email is required",
            'email.email' => "Email is not valid",
            'email.exists' => "Email doesn't exists",
            'password.required' => "Password is required",
            'password.min' => "Password must be at least 6 characters"
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], $messages);

        if (empty($request->email) && empty($request->password)) {
            alert()->error('Empty Fields! Provide username and password to Login', 'Error')->autoclose(2500);
            return back();
        } elseif ($validator->fails()) {
            alert()->error('Wrong credentials! check username and password and try again', 'Error')->autoclose(2500);
            return redirect('/login');
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                alert()->success('Login Successful!', 'Success')->autoclose(2500);
                return redirect('/admin-dash');
            } elseif (!Auth::attempt()) {
                alert()->error('Wrong credentials! check username and password and try again', 'Error')->autoclose(2500);
                return redirect('/login');
            }
        }
    }
}
