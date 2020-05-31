<?php

namespace App\Http\Controllers\Auth\Admin;

use Adldap\Adldap;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function username()
    {
        $column_name = config('ldap_auth.identifiers.database.username_column', null);
        if (!$column_name){
            die('Error in LoginController::username()');
        }
        return $column_name;

    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

//    public function login(Request $request)
//    {
//        if (Auth::guard('admin')->attempt([
//            'email' => $request->get('email'),
//            'password' => $request->get('password')],
//            $request->filled('remember'))) {
//            return redirect()->route('admin');
//        }
//        return redirect()->back()->with('status', 'Неправильный логин или пароль');
//    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $username = $credentials[$this->username()];
        $password = $credentials['password'];

        $user_format = 'fc\%s';
        $userdn = sprintf($user_format, $username);
//        if (Adldap::auth()->attempt($userdn, $password, $bindAsUser = true)) {
            $user = User::where($this->username(), $username)->first();
            if ($user) {
                Auth::guard('admin')->login($user, true);
                return true;
            }
            return false;
//        } else {
//            return false;
//        }

    }
}
