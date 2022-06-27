<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    // check if authenticated, then redirect to dashboard
    protected function authenticated()
    {
        if (Auth::check() && Auth::user()->type == 'ADM') {
            session(['type' => 'ADM']);
            return redirect()->route('admin.dashboard');
        }
        if (Auth::check() && Auth::user()->type == 'EMP') {
            session(['type' => 'EMP']);
            return redirect()->route('employee.dashboard');
        }
    }
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('guest')->except('logout');


    }*/


    public function __construct()
    {

        if (Auth::check() && Auth::user()->type == 'ADM') {
            session(['type' => 'ADM']);
            $this->redirectTo = route('admin');
        } elseif (Auth::check() && Auth::user()->type == 'EMP') {
            session(['type' => 'EMP']);
            $this->redirectTo = route('employee');
        }

        // $this->middleware('guest')->except('logout');
    }
}
